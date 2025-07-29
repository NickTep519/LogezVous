const input = document.getElementById("multiImageInput");
const preview = document.getElementById("preview");
let images = [];

input.addEventListener("change", () => {
    const files = Array.from(input.files);
    files.forEach((file) => {
        if (!file.type.startsWith("image/")) return;

        const reader = new FileReader();
        reader.onload = (e) => {
            const imageId = Date.now() + Math.random(); // Unique ID
            images.push({ id: imageId, file });

            const box = document.createElement("div");
            box.classList.add("image-box");
            box.setAttribute("data-id", imageId);

            const img = document.createElement("img");
            img.src = e.target.result;

            const btn = document.createElement("button");
            btn.classList.add("remove-btn");
            btn.innerHTML = "&times;";
            btn.onclick = () => {
                images = images.filter((img) => img.id !== imageId);
                box.remove();
            };

            box.appendChild(img);
            box.appendChild(btn);
            preview.appendChild(box);
        };
        reader.readAsDataURL(file);
    });

    // Reset input so same file can be reselected later
    // input.value = "";
});
