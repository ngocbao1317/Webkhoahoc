<template>
	<div class="nav-container primary-menu">
		<div class="mobile-topbar-header">
			<div>
				<img src="https://cdn.pixabay.com/photo/2024/02/04/09/53/ai-generated-8551847_1280.png" class="logo-icon" alt="logo icon">
			</div>
			<div>
				<h4 class="logo-text">KYLA</h4>
			</div>
			<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
			</div>
		</div>
		<nav class="navbar navbar-expand-xl w-100">
			<ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
				
				<li class="nav-item">
					<router-link to="/admin/loai-khoa-hoc">
						<a class="nav-link" href="/admin/loai-khoa-hoc">
							<div class="parent-icon"><i class="fa-solid fa-bookmark"></i>
							</div>
							<div class="menu-title">Loại Khóa Học</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/bai-viet">
						<a class="nav-link" href="/admin/bai-viet">
							<div class="parent-icon"><i class="fa-solid fa-newspaper"></i>
							</div>
							<div class="menu-title">Bài Biết</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/khach-hang">
						<a class="nav-link" href="/admin/khach-hang">
							<div class="parent-icon"><i class="fa-solid fa-user"></i>
							</div>
							<div class="menu-title">Khách Hàng</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/nhan-vien">
						<a class="nav-link" href="/admin/nhan-vien">
							<div class="parent-icon"><i class="fa-solid fa-user"></i>
							</div>
							<div class="menu-title">Nhân Viên</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/bai-hoc">
						<a class="nav-link" href="/admin/bai-hoc">
							<div class="parent-icon"><i class="fa-solid fa-book"></i>
							</div>
							<div class="menu-title">Bài Học</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/trac-nghiem">
						<a class="nav-link" href="/admin/trac-nghiem">
							<div class="parent-icon"><i class="fa-solid fa-file-export"></i>
							</div>
							<div class="menu-title">Trắc Nghiệm</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/chart">
						<a class="nav-link" href="/admin/chart">
							<div class="parent-icon"><i class="fa-solid fa-chart-line"></i>
							</div>
							<div class="menu-title">Chart</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/lich-su-giao-dich">
						<a class="nav-link" href="/admin/lich-su-giao-dich">
							<div class="parent-icon"><i class="fa-solid fa-chart-line"></i>
							</div>
							<div class="menu-title">Lich su giao dich</div>
						</a>
					</router-link>
				</li>
			</ul>
		</nav>
	</div>
</template>
<script>
export default {

}
</script>
<style></style>