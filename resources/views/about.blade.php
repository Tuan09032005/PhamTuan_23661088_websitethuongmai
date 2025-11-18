@include('admin/template/header')

<body style="background:var(--bg);">

<section class="py-5">
  <div class="container">

    <!-- HERO ABOUT -->
    <div class="row align-items-center mb-5">
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold">Về MyStore</h1>
        <p class="lead text-muted">Cung cấp điện thoại và thiết bị công nghệ chính hãng với dịch vụ tận tâm. Chúng tôi kết hợp sản phẩm chất lượng, giá cả minh bạch và trải nghiệm mua sắm tuyệt vời.</p>

        <div class="d-flex gap-3 mt-4">
          <a href="/products" class="btn btn-primary btn-lg">Xem sản phẩm</a>
          <a href="/lien-he" class="btn btn-outline-primary btn-lg">Liên hệ ngay</a>
        </div>
      </div>

      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?q=80&w=900&auto=format&fit=crop&ixlib=rb-4.0.3" alt="about" class="img-fluid rounded-4 shadow-lg">
      </div>
    </div>

    <!-- STATS -->
    <div class="row text-center mb-5">
      <div class="col-md-4">
        <div class="p-4 bg-white rounded-4 shadow-sm">
          <h3 class="fw-bold text-primary">10k+</h3>
          <p class="mb-0 text-muted">Khách hàng hài lòng</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 bg-white rounded-4 shadow-sm">
          <h3 class="fw-bold text-primary">500+</h3>
          <p class="mb-0 text-muted">Sản phẩm chính hãng</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 bg-white rounded-4 shadow-sm">
          <h3 class="fw-bold text-primary">8 năm</h3>
          <p class="mb-0 text-muted">Kinh nghiệm trong ngành</p>
        </div>
      </div>
    </div>

    <!-- MISSION / VISION / VALUES -->
    <div class="row g-4 mb-5">
      <div class="col-md-4">
        <div class="p-4 bg-white shadow-sm rounded-4 h-100">
          <h5 class="fw-bold text-primary">Sứ mệnh</h5>
          <p class="text-muted">Mang đến sản phẩm chính hãng cùng dịch vụ sau bán hàng tận tâm và nhanh chóng.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="p-4 bg-white shadow-sm rounded-4 h-100">
          <h5 class="fw-bold text-primary">Tầm nhìn</h5>
          <p class="text-muted">Trở thành thương hiệu được khách hàng tin tưởng hàng đầu về sản phẩm di động.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="p-4 bg-white shadow-sm rounded-4 h-100">
          <h5 class="fw-bold text-primary">Giá trị cốt lõi</h5>
          <ul class="text-muted mb-0">
            <li>Chính hãng</li>
            <li>Minh bạch</li>
            <li>Tận tâm</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- TIMELINE / MILESTONES -->
    <div class="row mb-5">
      <div class="col-lg-10 mx-auto">
        <div class="p-4 bg-white rounded-4 shadow-sm">
          <h4 class="fw-bold mb-3">Hành trình phát triển</h4>
          <div class="d-flex flex-column gap-3">
            <div class="d-flex gap-3 align-items-start">
              <div class="badge bg-primary text-white rounded-pill" style="width:44px; height:44px; display:flex; align-items:center; justify-content:center;">2017</div>
              <div>
                <div class="fw-semibold">Khởi nghiệp</div>
                <div class="text-muted">Mở cửa hàng đầu tiên và xây dựng nền tảng khách hàng.</div>
              </div>
            </div>

            <div class="d-flex gap-3 align-items-start">
              <div class="badge bg-primary text-white rounded-pill" style="width:44px; height:44px; display:flex; align-items:center; justify-content:center;">2019</div>
              <div>
                <div class="fw-semibold">Mở rộng</div>
                <div class="text-muted">Mở thêm chi nhánh và tối ưu quy trình bán hàng.</div>
              </div>
            </div>

            <div class="d-flex gap-3 align-items-start">
              <div class="badge bg-primary text-white rounded-pill" style="width:44px; height:44px; display:flex; align-items:center; justify-content:center;">2023</div>
              <div>
                <div class="fw-semibold">Chuỗi phát triển</div>
                <div class="text-muted">Hoàn thiện chuỗi dịch vụ và chăm sóc khách hàng.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- TEAM -->
    <div class="row mb-5">
      <div class="col-lg-10 mx-auto">
        <h4 class="fw-bold mb-4">Đội ngũ của chúng tôi</h4>
        <div class="row g-4">
          @php
            $team = [
              ["name"=>"Nguyễn A", "role"=>"Quản lý", "img"=>"https://via.placeholder.com/140"],
              ["name"=>"Trần B", "role"=>"Bán hàng", "img"=>"https://via.placeholder.com/140"],
              ["name"=>"Lê C", "role"=>"Hậu cần", "img"=>"https://via.placeholder.com/140"],
              ["name"=>"Phạm D", "role"=>"Kỹ thuật", "img"=>"https://via.placeholder.com/140"],
            ];
          @endphp

          @foreach($team as $member)
            <div class="col-md-3 col-sm-6">
              <div class="text-center p-4 bg-white rounded-4 shadow-sm">
                <img src="{{ $member['img'] }}" class="rounded-circle mb-3" width="120" height="120" alt="{{ $member['name'] }}">
                <div class="fw-semibold">{{ $member['name'] }}</div>
                <small class="text-muted">{{ $member['role'] }}</small>
                <p class="text-muted mt-2 small">Người tận tâm, giàu kinh nghiệm trong lĩnh vực bán lẻ thiết bị di động.</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- CTA -->
    <div class="text-center">
      <a href="/products" class="btn btn-primary btn-lg px-4">Xem sản phẩm</a>
      <a href="/lien-he" class="btn btn-outline-primary btn-lg ms-2">Liên hệ</a>
    </div>

  </div>
</section>

@include('admin/template/footer')

<style>
  .team-card, .shadow-sm{ transition: transform .25s ease, box-shadow .25s ease; }
  .team-card:hover, .shadow-sm:hover{ transform: translateY(-6px); box-shadow: 0 18px 40px rgba(2,6,23,0.08); }
  .hero-section{ background-position:center; background-size:cover; border-radius:12px; padding:40px; }
  @media(max-width:575px){ .hero-section{ padding:24px; } }
</style>

</body>
