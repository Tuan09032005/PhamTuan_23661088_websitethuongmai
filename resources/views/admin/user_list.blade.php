@include('admin/template/header')

<div class="admin-container">
   <div class="container">

      <div class="toolbar">
         <div class="left">
            <div>
               <h3 class="page-title">Danh sách người dùng</h3>
               <div class="page-subtitle">Quản lý người dùng hệ thống</div>
            </div>
         </div>

         <div class="right d-flex align-items-center">
            <input id="userSearch" class="form-control form-control-sm search" placeholder="Tìm theo tên hoặc tài khoản">
            <a href="{{ url('admin/them-nguoi-dung') }}" class="btn btn-admin btn-admin-primary ms-2">+ Thêm người dùng</a>
         </div>
      </div>

      <div class="content-box mt-3">
         <div class="table-responsive">
            <table class="table table-admin mb-0">
               <thead>
                  <tr>
                     <th>Tên tài khoản</th>
                     <th>Họ tên</th>
                     <th>Địa chỉ</th>
                     <th style="width:140px">Hành động</th>
                  </tr>
               </thead>
               <tbody id="usersTable">
                  @foreach ($users as $user)
                  <tr>
                     <td>
                        <div class="card-row">{{ $user->user_username }}</div>
                     </td>
                     <td>
                        <div class="card-row">{{ $user->user_fullname }}</div>
                     </td>
                     <td>
                        <div class="card-row">{{ $user->user_address }}</div>
                     </td>
                     <td>
                        <div class="d-flex gap-2 justify-content-center">
                           <a href="{{ url('admin/thong-tin-nguoi-dung/' . $user->user_id) }}" class="btn btn-sm btn-admin-outline">Sửa</a>
                           <button onclick="confirmDelete('{{ $user->user_id }}')" class="btn btn-sm btn-admin-outline">Xóa</button>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>

   </div>
</div>

@include('admin/template/footer')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   @if(session('success'))
      Swal.fire({
         toast: true,
         position: 'top-end',
         icon: 'success',
         title: '{{ session('success') }}',
         showConfirmButton: false,
         timer: 2200,
         timerProgressBar: true,
         width: '300px'
      });
   @endif

   function confirmDelete(id) {
      Swal.fire({
         title: 'Xác nhận xóa',
         text: 'Bạn có chắc chắn muốn xóa người dùng này?',
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#dc3545',
         cancelButtonColor: '#6c757d',
         confirmButtonText: 'Có, xóa!',
         cancelButtonText: 'Hủy'
      }).then((result) => {
         if (result.isConfirmed) {
            window.location.href = '/admin/xoa-nguoi-dung/' + id;
         }
      });
   }

   // client-side search
   document.getElementById('userSearch').addEventListener('input', function(e){
      const q = e.target.value.toLowerCase().trim();
      const rows = document.querySelectorAll('#usersTable tr');
      rows.forEach(r => {
         const username = r.querySelector('td:nth-child(1)').innerText.toLowerCase();
         const fullname = r.querySelector('td:nth-child(2)').innerText.toLowerCase();
         if (!q || username.includes(q) || fullname.includes(q)) r.style.display = '';
         else r.style.display = 'none';
      });
   });
</script>
