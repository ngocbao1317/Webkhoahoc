<template>
	<div class="topbar d-flex align-items-center">
		<nav class="navbar navbar-expand">
			<div class="topbar-logo-header d-flex align-items-center">
				<img src="https://cdn.pixabay.com/photo/2024/02/04/09/53/ai-generated-8551847_1280.png" class="logo-icon" style="width: 70px;"
					alt="logo icon">
				<h4 class="mt-3 ms-2">KYLA</h4>
			</div>
			<div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
			<div class="search-bar flex-grow-1">
				<div class="position-relative search-bar-box input-group w-100">
					<input type="text" class="form-control search-control border border-1 border-secondary radius-30"
						placeholder="Search..."> <span
						class="position-absolute top-50 search-show translate-middle-y"><i
							class='bx bx-search'></i></span>
					<span class="position-absolute top-50 search-close translate-middle-y"><i
							class='bx bx-x'></i></span>
					<button class="btn btn-outline-secondary radius-30" type="button" id="button-addon2">Tìm
						Kiếm</button>
				</div>
			</div>
			<div class="user-box dropdown">
                
                <template v-if="!isLogin">
                    <router-link to="/khach-hang/dang-nhap">
                        <button type="button" class="btn btn-outline-dark px-5 radius-30 me-2 d-flex align-items-center">
                            <i class="fa-regular fa-user me-2"></i>Đăng Nhập
                        </button>
                    </router-link>
                    <router-link to="/khach-hang/dang-ky">
                        <button type="button" class="btn btn-dark px-5 radius-30 d-flex align-items-center">
                            <i class="fa-solid fa-arrow-right-to-bracket me-2"></i>Đăng Ký
                        </button>
                    </router-link>
                </template>
                
                <template v-else>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                            <img src="/src/assets/images/avatars/avatar-13.png" 
                                class="rounded-circle me-2" 
                                style="width: 40px; height: 40px; object-fit: cover">
                            <span>{{ user.ho_va_ten }}</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><router-link to="/khach-hang/profile" class="dropdown-item" href="#">Profile</router-link></li>
                            <li><a class="dropdown-item" href="#">Khóa học</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" @click="logout" v-on:click="logout()">Đăng xuất</a></li>
                        </ul>
                    </div>
                </template>
            </div>
		</nav>
	</div>
</template>
<script>
export default {
	data() {
        return {
            isLogin: false,
            user: {
                ho_va_ten: '',
            }
        }
    },
    mounted() {
        this.checkLogin();
    },
    methods: {
        checkLogin() {
            const userInfo = localStorage.getItem('user');
            if (userInfo) {
                this.user = JSON.parse(userInfo);
                this.isLogin = true;
            }
        },

        logout() {
            localStorage.removeItem('user');
            localStorage.removeItem('key_khach_hang');
            this.isLogin = false;
            this.user = {
                ho_va_ten: '',
            };
            this.$router.push('/khach-hang/dang-nhap');
        }
    }
}
</script>
<style></style>