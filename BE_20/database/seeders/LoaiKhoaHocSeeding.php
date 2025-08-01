<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiKhoaHocSeeding extends Seeder
{
    public function run(): void
    {
        DB::table('loai_khoa_hocs')->delete();
        DB::table('loai_khoa_hocs')->truncate();
        DB::table('loai_khoa_hocs')->insert([
            [
                'ten_khoa_hoc' => 'Fullstack Node.js Developer',
                'slug_khoa_hoc' => 'fullstack-nodejs-developer',
                'hinh_anh' => 'https://cdn.mindmajix.com/courses/nodejs-training.png',
                'mo_ta_ngan' => 'Khóa học toàn diện về Node.js từ cơ bản đến nâng cao, bao gồm Express.js, MongoDB và phát triển RESTful API. Học viên sẽ được thực hành xây dựng các ứng dụng web thực tế và triển khai lên môi trường production.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'React.js Master Class',
                'slug_khoa_hoc' => 'reactjs-master-class',
                'hinh_anh' => 'https://www.patterns.dev/img/reactjs/react-logo@3x.svg',
                'mo_ta_ngan' => 'Khám phá React.js chuyên sâu với hooks, context API, Redux và các best practices. Học viên sẽ xây dựng các ứng dụng phức tạp với performance tối ưu.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'Python cho Data Science',
                'slug_khoa_hoc' => 'python-for-data-science',
                'hinh_anh' => 'https://www.educba.com/academy/wp-content/uploads/2019/09/Python-Libraries-For-Data-Science-Analysis-300x167.jpg',
                'mo_ta_ngan' => 'Học Python chuyên sâu cho phân tích dữ liệu với NumPy, Pandas và Matplotlib. Khóa học tập trung vào xử lý dữ liệu thực tế và visualization.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'AWS Cloud Practitioner',
                'slug_khoa_hoc' => 'aws-cloud-practitioner',
                'hinh_anh' => 'https://d1.awsstatic.com/training-and-certification/certification-badges/AWS-Certified-Cloud-Practitioner_badge.634f8a21af2e0e956ed8905a72366146ba22b74c.png',
                'mo_ta_ngan' => 'Làm quen với dịch vụ điện toán đám mây AWS. Học cách triển khai và quản lý các ứng dụng trên nền tảng cloud.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'Flutter Mobile Development',
                'slug_khoa_hoc' => 'flutter-mobile-development',
                'hinh_anh' => 'https://storage.googleapis.com/cms-storage-bucket/6a07d8a62f4308d2b854.svg',
                'mo_ta_ngan' => 'Phát triển ứng dụng mobile đa nền tảng với Flutter framework. Học cách tạo UI đẹp và responsive cho iOS và Android.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'Docker và Kubernetes',
                'slug_khoa_hoc' => 'docker-kubernetes',
                'hinh_anh' => 'https://www.docker.com/wp-content/uploads/2022/03/Moby-logo.png',
                'mo_ta_ngan' => 'Học containerization với Docker và orchestration với Kubernetes. Triển khai microservices và quản lý container trong môi trường production.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'Angular Advanced',
                'slug_khoa_hoc' => 'angular-advanced',
                'hinh_anh' => 'https://angular.io/assets/images/logos/angular/angular.svg',
                'mo_ta_ngan' => 'Khóa học nâng cao về Angular framework, tập trung vào state management, lazy loading và optimization.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'Machine Learning Cơ Bản',
                'slug_khoa_hoc' => 'machine-learning-co-ban',
                'hinh_anh' => 'https://itplus-academy.edu.vn/upload/e0299984838d38ecac3805d4d6661829/files/2024/machine%20learning.jpg',
                'mo_ta_ngan' => 'Nhập môn Machine Learning với Python, TensorFlow và Scikit-learn. Học các thuật toán cơ bản và ứng dụng thực tế.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'Golang Backend Development',
                'slug_khoa_hoc' => 'golang-backend-development',
                'hinh_anh' => 'https://go.dev/blog/go-brand/Go-Logo/SVG/Go-Logo_Blue.svg',
                'mo_ta_ngan' => 'Phát triển backend với Go language. Học cách xây dựng REST API hiệu năng cao và microservices.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'Unity Game Development',
                'slug_khoa_hoc' => 'unity-game-development',
                'hinh_anh' => 'https://www.mindinventory.com/blog/wp-content/uploads/2022/04/unity-3d-for-game-development.webp',
                'mo_ta_ngan' => 'Học phát triển game 2D và 3D với Unity Engine. Thực hành làm game từ ý tưởng đến sản phẩm hoàn chỉnh.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'MongoDB Advanced',
                'slug_khoa_hoc' => 'mongodb-advanced',
                'hinh_anh' => 'https://webassets.mongodb.com/_com_assets/cms/mongodb_logo1-76twgcu2dm.png',
                'mo_ta_ngan' => 'Tìm hiểu sâu về MongoDB, từ thiết kế schema đến optimization và scaling trong môi trường production.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'DevOps CI/CD',
                'slug_khoa_hoc' => 'devops-cicd',
                'hinh_anh' => 'https://www.jenkins.io/images/logo-title-opengraph.png',
                'mo_ta_ngan' => 'Học về quy trình CI/CD với Jenkins, GitLab CI và GitHub Actions. Tự động hóa quy trình phát triển và triển khai.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'Cybersecurity Fundamentals',
                'slug_khoa_hoc' => 'cybersecurity-fundamentals',
                'hinh_anh' => 'https://www.aim.com.au/sites/default/files/00960_AIM_Screens_CybersecurityFundamentals_640x360.jpg',
                'mo_ta_ngan' => 'Nhập môn an ninh mạng, học về các vulnerability phổ biến và cách bảo vệ hệ thống.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'SQL Master Course',
                'slug_khoa_hoc' => 'sql-master-course',
                'hinh_anh' => 'https://www.mysql.com/common/logos/logo-mysql-170x115.png',
                'mo_ta_ngan' => 'Khóa học chuyên sâu về SQL, từ basic queries đến advanced optimization và performance tuning.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'GraphQL Advanced',
                'slug_khoa_hoc' => 'graphql-advanced',
                'hinh_anh' => 'https://graphql.org/img/logo.svg',
                'mo_ta_ngan' => 'Học GraphQL nâng cao với Apollo Server và Client. Xây dựng API hiệu quả và flexible.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'Swift iOS Development',
                'slug_khoa_hoc' => 'swift-ios-development',
                'hinh_anh' => 'https://developer.apple.com/swift/images/swift-og.png',
                'mo_ta_ngan' => 'Phát triển ứng dụng iOS native với Swift và SwiftUI. Học UI/UX design patterns và best practices.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'Blockchain Development',
                'slug_khoa_hoc' => 'blockchain-development',
                'hinh_anh' => 'https://devqode.com/wp-content/uploads/2021/12/blockchain-development.png',
                'mo_ta_ngan' => 'Học phát triển ứng dụng blockchain với Ethereum và Smart Contracts. Tìm hiểu về Web3 và DeFi.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'Flutter UI Masterclass',
                'slug_khoa_hoc' => 'flutter-ui-masterclass',
                'hinh_anh' => 'https://storage.googleapis.com/cms-storage-bucket/70760bf1e88b184bb1bc.png',
                'mo_ta_ngan' => 'Chuyên sâu về UI/UX trong Flutter. Học cách tạo custom widgets và animations đẹp mắt.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'Java Spring Boot',
                'slug_khoa_hoc' => 'java-spring-boot',
                'hinh_anh' => 'https://spring.io/img/spring.svg',
                'mo_ta_ngan' => 'Phát triển ứng dụng enterprise với Spring Boot. Học về dependency injection, security và microservices.',
                'tinh_trang' => 1,
            ],
            [
                'ten_khoa_hoc' => 'TypeScript Pro',
                'slug_khoa_hoc' => 'typescript-pro',
                'hinh_anh' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Typescript_logo_2020.svg/1200px-Typescript_logo_2020.svg.png',
                'mo_ta_ngan' => 'Làm chủ TypeScript với advanced types, decorators và design patterns. Áp dụng type safety cho dự án.',
                'tinh_trang' => 1,
            ]
        ]);
    }
}
