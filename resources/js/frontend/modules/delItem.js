import Swal from "sweetalert2";
import { notyf } from "../../modules/notifyPlugin";

export default function delItem() {
    const del_items = document.querySelectorAll(".js-delete-item");
    del_items.forEach((del_item) => {
        del_item.addEventListener("click", (e) => {
            e.preventDefault();
            const current_url = window.location.href;
            const url = del_item.getAttribute("href");
            console.log("url", url);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(url, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                        },
                    })
                        .then((response) => {
                                console.log(response, "response");
                            if (response.ok) {
                                return response.json();
                            } else {
                                throw new Error("Something went wrong");
                            }
                        })
                        .then((data) => {
                            if (data.status === "success") {
                                notyf.success(data.message);
                                setTimeout(() => {
                                    window.location.href = current_url;
                                }, 1000);
                            } else {
                                console.error(data.message);
                                notyf.error(data.message);
                            }
                        })
                        .catch((error) => {
                            notyf.error(error.message);
                            console.error(error, "error");
                        });
                }
            });
        });
    });
}
