<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Lich su giao dich</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class='text-center align-middle'>#</th>
                                    <th class='text-center align-middle'>Ho ten khach hang</th>
                                    <th class='text-center align-middle'>Email khach hang</th>
                                    <th class='text-center align-middle'>So tien nap</th>
                                    <th class='text-center align-middle'>Ly do nap</th>
                                    <th class='text-center align-middle'>Kieu nap</th>
                                    <th class='text-center align-middle'>Nhan vien xu ly</th>
                                    <th class='text-center align-middle'>Thoi gian</th>

                                </tr>

                            </thead>
                            <tbody>
                                <template v-for="(v,index) in list" :key="index">
                                    <tr>
                                        <th class='text-center align-middle'>{{ index+1 }}</th>
                                    <td class='text-center align-middle'>{{ v.ten_kh }}</td>
                                    <td class='text-center align-middle'>{{ v.email }}</td>
                                    <td class=' align-middle'><button class="btn btn-warning w-100 text-end">{{ format(v.so_tien_nap) }}</button></td>
                                    <td class='text-center align-middle'>{{ v.noi_dung_nap }}</td>
                                    <td class='text-center align-middle'>
                                        <button v-if="v.kieu_nap==1" class="btn btn-primary">Nap bang tay</button>
                                        <button v-else class="btn btn-danger">Nap tu dong</button>
                                    </td>
                                    <td class='text-center align-middle'>{{ v.ten_nv }}</td>
                                    <td class=' align-middle'>{{ formatdate(v.created_at) }}</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    mounted() {
            this.loadData()
        },
    data() {
        return {
            list: []
        }
    },
    methods: {
        format(number) {
        return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(
            number,
        )
    },

        formatdate(thoi_gian) {
            const date = new Date(thoi_gian);
            return date.toLocaleString();
        },
        
        loadData() {
            axios
                .get('http://127.0.0.1:8000/api/admin/nap-tien/data', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    this.list = res.data.data;
                })
        },
    },
}
</script>
<style></style>