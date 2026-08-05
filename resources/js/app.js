import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "reverb",
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: window.location.hostname,
    wsPort: 8080,
    forceTLS: false,
    enabledTransports: ["ws"],
});

window.Echo.channel("senhas").listen("SenhaFoiChamada", (event) => {
    console.log(event);

    document.getElementById("mensagem").innerHTML = `
            Código: ${event.codigo}<br>
            Status: ${event.status}
        `;
});
