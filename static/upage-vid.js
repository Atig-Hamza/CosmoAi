const govid = document.getElementById("gotovideo");

govid.addEventListener("click", () => {
    document.getElementById("callmodal").classList.add("hidden");
    document.getElementById("videomodal").classList.remove("hidden");
});

const closemodal = document.getElementById("closemodal");
closemodal.addEventListener("click", () => {
    document.getElementById("callmodal").classList.add("hidden");
    document.getElementById("videomodal").classList.add("hidden");
});

const gocall = document.getElementById("gocall");
gocall.addEventListener("click", () => {
    document.getElementById("callmodal").classList.remove("hidden");
    document.getElementById("videomodal").classList.add("hidden");
});

const closemodal2 = document.getElementById("closemodal2");
closemodal2.addEventListener("click", () => {
    document.getElementById("callmodal").classList.add("hidden");
    document.getElementById("videomodal").classList.add("hidden");
})

govid.addEventListener("click", () => {
    const videoElement = document.getElementById('videoElement');

    if (navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: { facingMode: "user" } })
            .then((stream) => {
                videoElement.srcObject = stream;
            })
            .catch((error) => {
                console.error("Error accessing camera: ", error);
            });
    } else {
        console.error("getUserMedia not supported in this browser.");
    }
})