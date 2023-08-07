import Axios from "axios";

const baseUrl = process.env.APP_URL;

const instance = Axios.create({
    baseUrl,
});

instance.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

export default instance;
