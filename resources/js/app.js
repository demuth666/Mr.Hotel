import Swal from "sweetalert2";
import "./bootstrap";

window.addEventListener("alert", (event) => {
    let data = event.detail;

    Swal.fire({
        position: data.position,
        title: data.title,
        text: data.message,
        icon: data.type,
        showConfirmButton: false,
        timer: data.timer,
        toast: true,
    });
});

window.addEventListener("alert-delete", (event) => {
    let data = event.detail;

    Swal.fire({
        position: data.position,
        title: data.title,
        text: data.message,
        icon: data.type,
        showConfirmButton: false,
        timer: data.timer,
        toast: true,
    });
});
