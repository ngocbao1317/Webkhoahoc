<template>
    <div class="row">
        <template v-for="(v, k) in list" :key="k">
            <div class="col-lg-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title" :class="{ 'text-danger': !v.dap_an }">{{ v.cau_hoi }}</h5>
                        <hr class="mt-auto">
                        <div class="input-group">
                            <div class="input-group-text">
                                <input v-model="v.dap_an" class="form-check-input" value="1" type="radio"
                                    :name="'flexRadioDefault' + k">
                            </div>
                            <label class="form-control">{{ v.dap_an_1 }}</label>
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-text">
                                <input v-model="v.dap_an" class="form-check-input" value="2" type="radio"
                                    :name="'flexRadioDefault' + k">
                            </div>
                            <label class="form-control">{{ v.dap_an_2 }}</label>
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-text">
                                <input v-model="v.dap_an" class="form-check-input" value="3" type="radio"
                                    :name="'flexRadioDefault' + k">
                            </div>
                            <label class="form-control">{{ v.dap_an_3 }}</label>
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-text">
                                <input v-model="v.dap_an" class="form-check-input" value="4" type="radio"
                                    :name="'flexRadioDefault' + k">
                            </div>
                            <label class="form-control">{{ v.dap_an_4 }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button v-on:click="nopBai()" class="btn btn-danger w-100">
                <h4 class="mt-2 text-white" data-bs-toggle="modal" data-bs-target="#nopbaiModal">NỘP BÀI</h4>
            </button>
        </div>
    </div>
    <div class="modal fade" id="nopbaiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success" role="alert">
                        Bạn đã trả lời đúng : <b> {{ ketqua.so_cau_dung }} </b> câu hỏi
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ĐÓNG</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            list: [],
            ketqua : {
                'so_cau_dung': 0,
            }
        }
    },
    mounted() {
        this.loadTracNghiem();
    },
    methods: {
        loadTracNghiem() {
            axios
                .get("http://127.0.0.1:8000/api/trac-nghiem/data-open", {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
                .then((res) => {
                    this.list = res.data.data;
                })
        },
        nopBai() {
            let payload = {
                'list': this.list
            }
            axios
                .post("http://127.0.0.1:8000/api/trac-nghiem/nop-bai", payload, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
                .then((res) => {
                    if (res.data.status == 1) {
                        this.$toast.success(res.data.message);
                        this.so_cau_dung = res.data.so_cau_dung;
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        }
    },
}
</script>
<style></style>