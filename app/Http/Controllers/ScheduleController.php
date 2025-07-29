<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Zap\Facades\Zap;
use Zap\Models\Schedule;
use Illuminate\Http\Request;
use Zap\Models\SchedulePeriod;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {

        return view('schedules.calendar');
    }

    // ✅ Voir les dispos
    public function availability()
    {
        $agent = Auth::user();
        $availabilities = $agent->availabilitySchedules()->with(['periods'])->latest()->get();

        return view('schedules.availabilities', compact('availabilities'));
    }

    // ✅ Définir disponibilité
    public function storeAvailability(Request $request)
    {
        $agent = Auth::user();

        Zap::for($agent)
            // ->named($request->name)
            ->description($request->location)
            ->availability()
            ->from($request->date)
            // ->weekly($request->days) // ['monday','wednesday']
            ->addPeriod($request->start_time, $request->end_time)
            ->save();

        return back()->with('success', 'Disponibilité ajoutée !');
    }

    public function myAppointments()
    {

        $user = Auth::user();

        $appointments = $user->appointmentSchedules()->with(['periods'])->latest()->paginate(15);

        // dd($appointments) ;

        return view('schedules.appointments', [
            'appointments' => $appointments
        ]);
    }


    // ✅ Voir les RDVs
    public function getAppointments()
    {
        $user = Auth::user();

        $appointments = $user->appointmentSchedules()->with(['periods'])->get()->flatMap(function ($appointment) {
            return $appointment->periods->map(function ($period) use ($appointment) {

                $color = null;
                switch ($appointment->status) {
                    case 'pending':
                        $color = '#f0ad4e';
                        break;
                    case 'confirmed':
                        $color = '#2876a7ff';
                        break;
                    case 'cancelled':
                        $color = '';
                        break;
                    case 'terminated':
                        $color = '#d9534f';
                        break;
                    default:
                        $color = (Carbon::parse($period->date->format('Y-m-d') . ' ' . $period->end_time)->lt(now())) ? '#d9534f' : '#2876a7ff';
                        break;
                }
                return [
                    'id' => $appointment->id . '-' . $period->id,
                    'title' => $appointment->name . ': ' . __('global.' . $appointment->status),
                    'start' => $period->date->format('Y-m-d') . ' ' . $period->start_time,
                    'end' => $period->date->format('Y-m-d') . ' ' . $period->end_time,
                    'color' => $color,
                ];
            });
        });


        return response()->json($appointments);
    }




    // ✅ Créer un RDV
    public function storeAppointment(Request $request)
    {
        $agent = User::find($request->agent_id);

        Zap::for(Auth::user())
            ->named($request->name)
            ->appointment()
            ->from($request->date)
            ->addPeriod($request->start_time, $request->end_time)
            ->withMetadata([
                'name' => $request->name ,
                'email' => $request->email,
                'tel' => $request->tel
            ])
            ->noOverlap()
            ->save();

        return back()->with('success', 'Rendez-vous pris !');
    }
}
