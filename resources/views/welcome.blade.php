<div class="flex-center position-ref full-height">
  <div class="content">
    <div id="app">
      <div class="links">
        <!-- 建立 Vue Router 連結-->
        <router-link to="/home">Home</router-link>
        <router-link to="/category">Category</router-link>
      </div>
      <!-- Vue Router 代入的內容 -->
      <router-view></router-view>
    </div>
  </div>
</div>
<!-- 引入 Vue app -->
<script src="{{ asset('/js/app.js') }}"></script>