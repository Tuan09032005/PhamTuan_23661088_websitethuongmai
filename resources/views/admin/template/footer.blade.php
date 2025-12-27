<footer class="site-footer">
  <div class="container">
    <div class="row">

      <div class="col-md-4 mb-4">
        <h5>MyStore</h5>
        <p>Cửa hàng điện thoại chính hãng – uy tín – giá tốt.</p>
      </div>

      <div class="col-md-4 mb-4">
        <h5>Liên kết</h5>
        <ul style="list-style:none; padding-left:0;">
          <li><a href="/home" class="text-white text-decoration-none">Home</a></li>
          <li><a href="/admin/danh-sach-san-pham" class="text-white text-decoration-none">Quản lí sản phẩm</a></li>
          <li><a href="/admin/danh-sach-nguoi-dung" class="text-white text-decoration-none">Quản lí người dùng</a></li>
          <li><a href="/admin/login" class="text-white text-decoration-none">Đăng nhập</a></li>
        </ul>
      </div>

      <div class="col-md-4 mb-4">
        <h5>Liên hệ</h5>
        <p>Email: <span class="text-primary">support@mystore.com</span></p>
        <p>Hotline: <span class="text-primary">0123 456 789</span></p>
        <div style="margin-top:12px;">
          <div style="width:100%; height:180px; overflow:hidden; border-radius:8px;">
            <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=106.6000%2C10.7900%2C106.6600%2C10.8500&amp;layer=mapnik&amp;marker=10.8231%2C106.6297" style="border:0; width:100%; height:100%;" loading="lazy"></iframe>
          </div>
          <small><a href="https://www.openstreetmap.org/?mlat=10.8231&amp;mlon=106.6297#map=13/10.8231/106.6297" target="_blank" style="color:#cbd5e1; text-decoration:none;">Xem trên bản đồ</a></small>
        </div>
      </div>

    </div>

    <hr style="border-color:rgba(255,255,255,0.06);">

    <div class="text-center">
      © 2025 PhamTuan – All rights reserved.
    </div>

  </div>
</footer>

<script>
  // Intersection Observer to add 'in-view' class when elements scroll into view
  (function(){
    if (!('IntersectionObserver' in window)) return;
    const io = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{
        if (e.isIntersecting) {
          e.target.classList.add('in-view');
          // If you want to animate only once, unobserve
          io.unobserve(e.target);
        }
      });
    }, {root:null, rootMargin:'0px 0px -6% 0px', threshold: 0.06});

    document.querySelectorAll('.animate-item, .animate-fade-up, .animate-fade-in').forEach(el=> io.observe(el));
  })();
</script>
