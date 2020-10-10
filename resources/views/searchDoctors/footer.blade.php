        <!-- Footer Section-->
    
    <!-- Copyright-->
    <div class="copyrights text-center">
      <div class="container">
        <div class="row">
          <div class="col-md"><span>Copyright &copy; <?php echo date("Y");?>, El Tawheed.</span></div>
        </div>
      </div>
    </div>
  </body>
  <script src="{{url('/')}}/design/src/js/vendors/jquery-3.2.1.js"></script>
  <script src="{{url('/')}}/design/assets/js/main.js"></script>
  <script src="{{url('/')}}/design/src/js/vendors/bootstrap.min.js"></script>
  <script src="{{url('/')}}/design/src/js/vendors/popper.min.js"></script>
  <script src="{{url('/')}}/design/src/js/vendors/jquery.min.js"></script>
  <script src="{{url('/')}}/design/src/js/vendors/jquery.bxslider.min.js"></script>
  <script src="{{url('/')}}/design/src/js/vendors/jquery.mixitup.js"></script>
  <script src="{{url('/')}}/design/assets/js/owl.carousel.min.js"></script>
  <script src="{{url('/')}}/design/assets/js/jquery.exzoom.js"></script>

  <!-- <script >
    $('#search').on('keyup',function(){
      $value=$(this).val();
      $.ajax({
      type : 'get',
      url : '{{URL::to('search')}}',
      data:{'search':$value},
      success:function(data){
      $('tbody').html(data);
      }
      });
    })

  </script>
  <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  </script> -->
</html>