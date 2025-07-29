@extends('dashboard.base')

@section('title', config('app.name') . ' | ' . $agent->name)

@section('content')

    <div class="col-lg-9 col-md-12">
        <div class="dashboard-wraper">

            <div class="form-submit">
                <h4> {{ $agent->name }} ({{ $agent->pseudo_or_agency }}) -
                    {{ $agent->created_at->translatedFormat('d M Y') }} </h4>
                <h6>Tel : {{ $agent->phone }} </h6>
            </div>

            <div class="row justify-content-center g-lg-3 g-4">

                <div class="rating-overview">
                    <div class="rating-overview-box">
                        <span class="rating-overview-box-total"> {{ $agent->averageRating() }} </span>
                        <span class="rating-overview-box-percent"> @lang('global.out of 5.0') </span>
                        <div class="star-rating" data-rating="5">
                            @for ($i = 0; $i < $agent->averageRating(); $i++)
                                <i class="fas fa-star fs-xs mx-1"></i>
                            @endfor
                            {{-- <i class="fas fa-star fs-xs mx-1"></i>
                            <i class="fas fa-star fs-xs mx-1"></i>
                            <i class="fas fa-star fs-xs mx-1"></i>
                            <i class="fas fa-star fs-xs mx-"></i> --}}
                        </div>
                    </div>

                    <div class="rating-bars">
                        <div class="rating-bars-item">
                            <span class="rating-bars-name">@lang('global.Conversion rate') </span>
                            {{-- Ex : 65% des leads traités ont abouti à une signature --}}
                            <span class="rating-bars-inner">
                                <span class="rating-bars-rating high" data-rating="4.7">
                                    <span class="rating-bars-rating-inner" style="width: 85%;"></span>
                                </span>
                                <strong>4.7</strong>
                            </span>
                        </div>
                        <div class="rating-bars-item">
                            <span class="rating-bars-name"> @lang('global.Rate of goods sold vs. in portfolio') </span>
                            {{-- Ex : 70% des biens confiés à l’agent ont trouvé preneur --}}
                            <span class="rating-bars-inner">
                                <span class="rating-bars-rating good" data-rating="3.9">
                                    <span class="rating-bars-rating-inner" style="width: 75%;"></span>
                                </span>
                                <strong>3.9</strong>
                            </span>
                        </div>
                        <div class="rating-bars-item">
                            <span class="rating-bars-name">@lang('global.Rental')</span>
                            <span class="rating-bars-inner">
                                <span class="rating-bars-rating mid" data-rating="3.2">
                                    <span class="rating-bars-rating-inner" style="width: 52.2%;"></span>
                                </span>
                                <strong>3.2</strong>
                            </span>
                        </div>
                        <div class="rating-bars-item">
                            <span class="rating-bars-name">@lang('global.Sale')</span>
                            <span class="rating-bars-inner">
                                <span class="rating-bars-rating poor" data-rating="2.0">
                                    <span class="rating-bars-rating-inner" style="width:20%;"></span>
                                </span>
                                <strong>2.0</strong>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="property_block_wrap style-2">

                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#amen" data-bs-target="#clThree" aria-controls="clThree"
                            href="javascript:void(0);" aria-expanded="true">
                            <h4 class="property_block_title"> 📈 @lang('global.Performance & activity') </h4>
                        </a>
                    </div>

                    <div id="clThree" class="panel-collapse collapse show">
                        <div class="block-body">
                            <ul class="avl-features2 third color">
                                <li>🎯 @lang('global.Number of properties') : {{ $properties->total() }} </li>
                                <li> 📋 Nombre de visites organisées </li>
                                <li>💬 Nombre de contacts</li>
                                <li>🏠 Nombre de biens vendus ou loués ce mois-ci</li>
                                <li>💵 Chiffre d’affaires généré (ventes, commissions)</li>
                                <li>📆 Historique des ventes / locations réalisées</li>
                                <li>🔄 Taux de transformation (prospects → ventes)</li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="property_block_wrap style-2">

                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#floor" data-bs-target="#clFive" aria-controls="clFive"
                            href="javascript:void(0);" aria-expanded="true" class="collapsed">
                            <h4 class="property_block_title"> 🤝 @lang('global.Satisfaction & customer relations') </h4>
                        </a>
                    </div>

                    <div id="clFive" class="panel-collapse collapse">
                        <div class="block-body">

                            <div class="nearby-wrap">
                                <div class="nearby_header">
                                    <div class="nearby_header_first">
                                        <h5> @lang('global.5 latest reviews') </h5>
                                    </div>
                                    <div class="nearby_header_last">
                                        <div class="nearby_powerd">
                                            Notes
                                        </div>
                                    </div>
                                </div>
                                <div class="neary_section_list">

                                    @foreach ($reviews as $review)
                                        <div class="neary_section">
                                            <div class="neary_section_first">
                                                <h4 class="nearby_place_title"> {{ $review->client->name }} <small></small>
                                                </h4>
                                            </div>
                                            <div class="neary_section_last">
                                                <div class="nearby_place_rate">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <i class="fa fa-star {{ ($i < $agent->averageRating()) ? 'filled' : ''}} "></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="property_block_wrap style-2">

                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#vid" data-bs-target="#clFour" aria-controls="clFour"
                            href="javascript:void(0);" aria-expanded="true" class="collapsed">
                            <h4 class="property_block_title"> 📂 @lang('global.Asset portfolio') </h4>
                        </a>
                    </div>

                    <div id="clFour" class="panel-collapse collapse">
                        <div class="block-body">

                            <form class="row g-3 mb-4">
                                {{-- <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Rechercher par nom ou email..." />
                        </div> --}}
                                {{-- <div class="col-md-4">
                            <select class="form-select">
                                <option value="">Filtrer par statut</option>
                                <option value="actif">Actif</option>
                                <option value="inactif">Inactif</option>
                                <option value="en-attente">En attente</option>
                            </select>
                        </div>
                        <div class="col-md-2 d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-filter"></i> Filtrer
                            </button>
                        </div> --}}
                            </form>

                            <!-- 🧾 Tableau -->
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-striped align-middle shadow-sm">
                                    <thead class="table-primary text-center">
                                        <tr>
                                            <th>#</th>
                                            <th> @lang('label.Listing type') </th>
                                            <th> @lang('global.Owner name') </th>
                                            <th>@lang('label.City')/@lang('label.Neighborhood')</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($properties as $property)
                                            <tr>
                                                <th scope="row"> {{ $property->configuration_code }} </th>
                                                <td> {{ $property->listing_type }} </td>
                                                <td> {{ $property?->owner?->name }} </td>
                                                <td> {{ $property->city }}/{{ $property->neighborhood }}</td>
                                                <td><span class="badge bg-success">{{ $property->status }} </span> <a
                                                        href="#">
                                                        {{ $property?->tenant ? ': ' . $property?->tenant?->user->name : '' }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('properties.show', $property) }}"
                                                        class="btn btn-sm btn-outline-primary me-1" title="Voir">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    {{-- <button type="button" class="btn btn-sm btn-outline-primary me-1"
                                                title="Voir" data-bs-toggle="modal" data-bs-target="#userInfoModal">
                                                <i class="bi bi-eye"></i>
                                            </button> --}}

                                                    <a href="{{ route('properties.edit', $property) }}"
                                                        class="btn btn-sm btn-outline-warning me-1" title="Modifier">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <!-- 🔴 Bouton suppression avec modale -->
                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                        title="Supprimer">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $properties->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>



                <!-- 👁️ MODALE INFO -->
                <div class="modal fade" id="userInfoModal" tabindex="-1" aria-labelledby="userInfoLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="userInfoLabel">
                                    <i class="bi bi-person-lines-fill me-2"></i>Informations de l'utilisateur
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Fermer"></button>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Nom :</strong> Marie Dupont</li>
                                    <li class="list-group-item"><strong>Email :</strong> marie.dupont@email.com</li>
                                    <li class="list-group-item"><strong>Rôle :</strong> Administratrice</li>
                                    <li class="list-group-item"><strong>Statut :</strong> <span
                                            class="badge bg-success">Actif</span></li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- 🗑️ MODALE DE CONFIRMATION SUPPRESSION -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="confirmDeleteLabel"><i
                                        class="bi bi-exclamation-triangle-fill me-2"></i>Confirmation de suppression</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Fermer"></button>
                            </div>
                            <div class="modal-body text-center">
                                <p>Êtes-vous sûr de vouloir <strong>supprimer</strong> cet utilisateur ?</p>
                                <p class="text-muted small">Cette action est irréversible.</p>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-danger">Supprimer</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
