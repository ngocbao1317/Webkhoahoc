<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-primary" id="myTab" role="tablist">

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#profiletab" role="tab"
                                    aria-selected="true">
                                    <div class="tab-icon"><i class="fa-solid fa-address-card"></i>
                                    </div>
                                    <div class="tab-title">Profile</div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#naptientab" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <div class="tab-icon"><i class="fa-solid fa-money-bills"></i>
                                    </div>
                                    <div class="tab-title">Nạp tiền</div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content py-3" id="myTabContent">

                            <div class="tab-pane fade show active" id="profiletab" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-4 d-flex">
                                        <div class="card flex-fill">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <img src="" alt="">
                                                    <div class="mt-3">
                                                        <h4> {{ profile.hoTen }}</h4>
                                                        <p class="text-secondary mb-1">{{ profile.email }}</p>
                                                        <p class="text-secondary mb-1">{{ profile.soDienThoai }}</p>
                                                        <p class="text-muted font-size-sm ">{{ profile.diaChi }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 d-flex">
                                        <div class="card flex-fill">
                                            <div class="row mb-3 ">
                                                <div class="col-lg-3">
                                                    <h6 class="mb-0 ms-2 mt-2">Họ và tên</h6>
                                                </div>
                                                <div class="col-lg-9 text-secondary">
                                                    <input type="text" class="form-control"
                                                        placeholder="Nhập họ và tên">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <h6 class="mb-0 ms-2 mt-2">Email</h6>
                                                </div>
                                                <div class="col-lg-9 text-secondary">
                                                    <input type="text" class="form-control" placeholder="Nhập email">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <h6 class="mb-0 ms-2 mt-2">Số điện thoại</h6>
                                                </div>
                                                <div class="col-lg-9 text-secondary">
                                                    <input type="text" class="form-control"
                                                        placeholder="Nhập số điện thoại">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <h6 class="mb-0 ms-2 mt-2">Địa chỉ</h6>
                                                </div>
                                                <div class="col-lg-9 text-secondary">
                                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                </div>
                                                <div class="col-lg-9 text-secondary">
                                                    <button class="btn btn-primary px-4">lưu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="naptientab" role="tabpanel">
                                <div class="col">
                                    <h4>Nạp tiền tài khoản</h4>
                                </div>
                                <div class="col">Nạp tiền và lịch sử nạp tiền</div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <label for="">Số tiền cần nạp</label>
                                                <input type="number" class="form-control mt-2">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#napTienModal">Xác nhập</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal fade" id="napTienModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận nạp tiền
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-success" role="alert">
                                                    Bạn hãy thanh toán số tiền qua QR này, Số tiền này sẽ được tự động
                                                    xác nhận sau vài phút !
                                                </div>
                                                <div class="row justify-content-center align-items-center">
                                                    <img src="/src/assets/images/qr.png" alt="" class="img-fluid "
                                                        style="width: 50%;">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Đóng</button>
                                                <button type="button" class="btn btn-primary">Xác nhận nạp</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            profile: {
                ho_va_ten: '',
                email: '',
                so_dien_thoai: '',
                
            }
        }
    },
    async created() {
        try {
            const token = localStorage.getItem('token');
            const response = await axios.get('http:///api/khach-hang/profile', {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            });
            this.profile = response.data.data;
        } catch (error) {
            console.error('Error fetching profile:', error);
        }
    },
    methods: {
        async updateProfile() {
            try {
                const token = localStorage.getItem('token');
                await axios.post('http://localhost:8000/api/khach-hang/update-profile', this.profile, {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });
                alert('Cập nhật thông tin thành công!');
            } catch (error) {
                console.error('Error updating profile:', error);
                alert('Có lỗi xảy ra khi cập nhật thông tin!');
            }
        }
    }
}
</script>
<style></style>