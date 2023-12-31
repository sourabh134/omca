@include('admin.header')
<div class="main_content_iner ">
  <div class="container-fluid p-0">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_header">
            <div class="box_header m-0">
              <div class="main-title">
                <h3 class="m-0">{{$title}}</h3>
              </div>
            </div>
          </div>
          <div class="white_card_body">
            <div class="QA_section">
              <div class="white_box_tittle list_header">
                <h4></h4>
                <div class="box_right d-flex lms_block">
                  <div class="serach_field_2">
                    <div class="search_inner">
                      <!-- <form Active="#"><div class="search_field"><input type="text" placeholder="Search content here..."></div><button type="submit"><i class="ti-search"></i></button></form> -->
                    </div>
                  </div>
                  <div class="add_button ms-2">
                    <a href="{{url('/addTreatments')}}" class="btn_1">Add New</a>
                  </div>
                </div>
              </div>
              <div class="QA_table mb_30">
                <table class="table lms_table_active ">
                  <thead>
                    <tr>
                      <th scope="col">S.No.</th>
                      <th scope="col">Image</th>
                      <th scope="col">Speciality</th>
                      <th scope="col">Name</th>
                      <th scope="col">Content</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>                    
                    @php
                    $i=1
                    @endphp
                    @foreach($treatmeant as $value)
                    <tr>
                      <!-- <th scope="row">
                        <a href="#" class="question_content"> title here 1</a>
                      </th> -->
                      <td>{{$i}}</td>
                      <td><img src="../images/{{$value->image}}" alt="Image" width="100px"></td>
                      <td><?php echo $sql = App\Models\Specialization::where('id',$value->specialityId)->first()->name;?></td>
                      <td>{{$value->name}}</td>
                      <td><?=substr($value->description,0,50)?>...</td>                      
                      <td>
                        <a href="#" class="status_btn">Active</a>
                      </td>
                      <td><a href="{{url('/addTreatments?key='.base64_encode($value->id))}}"><i class="fa fa-edit"></i></a> | <a class="delete" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12"></div>
    </div>
  </div>
</div>
<script>
  $(".delete").click(function(){
    var id = $(this).data('id');
    var token = "<?=csrf_token()?>";
    if(confirm("Are you sure want to delete this?")){
      $.ajax({
          type:'POST',
          url:'{{url("/delete_treatmeants")}}',
          data  :{id:id,_token:token},          
          success:function(data){
            location.reload();
          }
          
      });
    }    
  })
</script>
 @include('admin.footer')