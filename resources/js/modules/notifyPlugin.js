import { Notyf } from "notyf";
import "notyf/notyf.min.css"; // Ensure styles are included
export const notyf = new Notyf({
    duration: 4000,
    position: {
        x: "right",
        y: "top",
    },
});
