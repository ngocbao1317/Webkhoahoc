import axios from "axios";

export default function(from, to, next) {
    axios
        .get("http://127.0.0.1:8000/api/khach-hang/check-login", {
            headers: {
                Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
            }
        })
        .then((res) => {
            if (res.data.status) {
                next();
            } else {
                next("/khach-hang/dang-nhap");
                this.$toast.error("Bạn cần đăng nhập trước!!!!");

            }
        });
}