<?= $this->extend('layouts/admin-layout') ?>

<?= $this->section('title') ?>
Tạo đề thi
<?= $this->endSection() ?>

<?= $this->section('extra_css') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Upcube</a></li>
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active">File Uploads</li>
                    </ol>
                </div>
                <h4 class="page-title">Tạo đề thi</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert" >
                        <?= validation_list_errors() ?>
                    </div>


                    <form action="<?=base_url('/admin/assessment/create')?>" method="post"  >
                        <div class="row g-4">
                            <!-- Cột trái -->
                            <div class="col-md-7">
                                <!-- Phần lọc & danh sách câu hỏi -->
                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <span class="mb-0">Lọc Câu Hỏi</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="card card pr-3 pl-3 mb-2" id="filters">
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label class="form-label">Lớp</label>
                                                    <select name="grade_id" class="form-control form-control-sm" id="gradeId">
                                                        <option value="">Chọn lớp</option>
                                                        <?php foreach ($grades as $item): ?>
                                                            <option value="<?=$item['id']?>"><?= esc($item['name']) ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Môn học</label>
                                                    <select name="subject_id" class="form-control form-control-sm" id="subjectId">
                                                        <option value="">Chọn môn học</option>
                                                        <?php foreach ($subjects as $item): ?>
                                                            <option value="<?=$item['id']?>"><?= esc($item['name']) ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Chủ đề</label>
                                                    <select name="topic_id" class="form-control form-control-sm" id="topicId">
                                                        <option value="">Tất cả chủ đề</option>
                                                        <!-- ... -->
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Bộ lọc -->
                                            <div class="row g-3 mb-4">
                                                <div class="col-md-4">
                                                    <label class="form-label">Độ khó</label>
                                                    <select class="form-control form-control-sm" id="difficultyId" name="difficulty">
                                                        <option value="">Tất cả</option>
                                                        <option value="1">1 - Cực dễ</option>
                                                        <option value="2">2 - Đễ</option>
                                                        <option value="3">3 - Trung bình</option>
                                                        <option value="4">4 - Hơi khó</option>
                                                        <option value="5">5 - Khó</option>
                                                        <!-- ... -->
                                                    </select>
                                                </div>
                                                <div class="col-md-8">
                                                    <label class="form-label">Từ khóa</label>
                                                    <input type="text" name="keyword" class="form-control form-control-sm" id="keywordFilter">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Danh sách câu hỏi -->
                                        <div class="list-group" id="questionList" data-offset="0">
                                            <!-- Câu hỏi mẫu -->
<!--                                            <div class="list-group-item">-->
<!--                                                <div class="d-flex justify-content-between align-items-center">-->
<!--                                                    <div>-->
<!--                                                        <small class="text-muted">[COMPARATIVE] Độ khó: 2</small>-->
<!--                                                        <p class="mb-1">Which is the correct comparative form of "happy"?</p>-->
<!--                                                    </div>-->
<!--                                                    <button class="btn btn-sm btn-success"><i class="ti-plus"></i></button>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!-- ... -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Cột phải -->
                            <div class="col-md-5">
                                <!-- Phần câu hỏi đã chọn -->
                                <div class="card">
                                    <div class="card-header bg-success text-white">
                                        <span class="mb-0">Câu Hỏi Đã Chọn (5)</span>
                                    </div>
                                    <div class="card-body">
                                        <!-- Danh sách có thể kéo thả -->
                                        <div class="list-group" id="selectedQuestions">
                                            <!-- Item mẫu -->
                                            <div class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <small class="text-muted">#1</small>
                                                        <p class="mb-1">Which is bigger, the sun or the moon?</p>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-sm btn-danger"><i class="ti-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Item mẫu -->
                                            <div class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <small class="text-muted">#2</small>
                                                        <p class="mb-1">Which is bigger, the sun or the moon?</p>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-sm btn-danger"><i class="ti-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Nút lưu đề -->
                                        <div class="mt-3">
                                            <button class="btn btn-primary w-100">Lưu Đề Thi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div> <!-- end container -->
<?= $this->endSection() ?>

<?= $this->section('extra_javascript') ?>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script>
    var lazyLoading = false;
    $(function () {
        $("#selectedQuestions").sortable({
            update: function() {
                // Cập nhật thứ tự câu hỏi khi kéo thả
            }
        });

        $('#keywordFilter').keypress(function(event) {
            if (event.which === 13) { // 13 is the key code for Enter
                // Your code to execute when Enter is pressed
                resetQuestionListView();
                var gradeId = $("#gradeId").val();
                var subjectId = $("#subjectId").val();
                var topicId = $("#topicId").val();
                var difficulty = $("#difficultyId").val();
                var keyword = $(this).val();
                loadQuestion(gradeId, subjectId, topicId, difficulty, keyword, 0);

                event.preventDefault(); // Prevents default form submission

            }
        });

        $("#gradeId").change(function(){
            resetQuestionListView();
            $("#subjectId").val($("#subjectId option:first").val());
            document.getElementById("topicId").options.length = 1;
        });

        $("#subjectId").change(function(){
            resetQuestionListView();
            var gradeId = $("#gradeId").val();
            var subjectId = $(this).val();
            var difficulty = $("#difficultyId").val();
            var keyword = $("#keywordFilter").val();
            loadQuestion(gradeId, subjectId, 0, difficulty, keyword, 0);

            document.getElementById("topicId").options.length = 1;
            jQuery.ajax({
                type: "GET",
                url: urls.getTopicBySubject_url,
                dataType: 'json',
                data: {subject_id: subjectId},
                success: function(res){

                    for(key in res){
                        $("#topicId").append("<option value='"+res[key].id+"'>" + res[key].name + "</option>");
                    }
                }
            });
        });

        $("#topicId").change(function(){
            resetQuestionListView();
            var gradeId = $("#gradeId").val();
            var subjectId = $("#subjectId").val();
            var topicId = $(this).val();
            var keyword = $("#keywordFilter").text();
            var difficulty = $("#difficultyId").val();
            loadQuestion(gradeId, subjectId, topicId, difficulty, keyword, 0);
        });

        $("#difficultyId").change(function(){
            resetQuestionListView();
            var gradeId = $("#gradeId").val();
            var subjectId = $("#subjectId").val();
            var topicId = $("#topicId").val();
            var difficulty = $(this).val();
            var keyword = $("#keywordFilter").val();
            loadQuestion(gradeId, subjectId, topicId, difficulty, keyword, 0);
        });

        window.addEventListener('scroll', function() {
            var scrollableContent = document.getElementById('questionList');
            var hasReachedBottom = scrollableContent.getBoundingClientRect().bottom <= window.innerHeight;
            if (hasReachedBottom) {
                // Load more content here
                var gradeId = $("#gradeId").val();
                var subjectId = $("#subjectId").val();
                var topicId = $("#topicId").val();
                var difficulty = $("#difficultyId").val();
                var offset = $("#questionList").data('offset');
                var keyword = $("#keywordFilter").val();
                if(subjectId != null && offset > 0 && !lazyLoading){
                    lazyLoading = true;
                    loadQuestion(gradeId, subjectId, topicId, difficulty, keyword, offset);
                }
            }
        });
    });

    function loadQuestion(gradeId, subjectId, topicId, difficulty, keyword, offset){
        $('#preloader').show();
        jQuery.ajax({
            type: "POST",
            url: urls.getQuestions_url,
            dataType: 'json',
            data: {grade_id: gradeId,subject_id: subjectId, topic_id: topicId, difficulty: difficulty, keyword: keyword, offset: offset},
            success: function(res){
                if(res.length > 0){
                    $("#questionList").data('offset', offset + 1)
                    //console.log('new offset:'+ $("#questionList").data('offset'));
                } else {
                    $("#questionList").data('offset', 0); // stop lazy load
                    $('#preloader').hide();
                }
                for(key in res){
                    var startHtml = '';
                    for(var i = 0; i < res[key].difficulty; i++){
                        startHtml += '<i class="ti-star font-14 text-primary"></i>';
                    }
                    var html = '<div id="qpool-' + res[key].id + '" class="list-group-item">' +
                        '           <div class="d-flex justify-content-between align-items-center">' +
                        '           <div style="width: 90%">' +
                        '                 <small class="text-muted">Chủ đề: ' + res[key].topic_code + ', Độ khó: ' + startHtml + '</small>' +
                        '                  <p class="mb-1">' + res[key].question + '</p>' +
                        '                   <div class="row">' +
                        '                       <div class="col-sm-3 text-nowrap">A. ' + res[key].option_a + '</div>' +
                        '                       <div class="col-sm-3 text-nowrap">B. ' + res[key].option_b + '</div>' +
                        '                       <div class="col-sm-3 text-nowrap">C. ' + res[key].option_c + '</div>' +
                        '                       <div class="col-sm-3 text-nowrap">D. ' + res[key].option_d + '</div>' +
                        '                   </div>' +
                        '           </div>' +

                        '           <a data-qpool="' + res[key].id + '" class="btn btn-sm btn-success add2Assessment text-white"><i class="ti-plus"></i></a>' +
                        '</div>' +
                        '</div>';


                    $("#questionList").append(html);
                    lazyLoading = false;
                    $('#preloader').hide();
                    initialAdd2Assessment();
                }
            }
        });
    }

    function initialAdd2Assessment(){

        $(".add2Assessment").unbind('click');
        $(".add2Assessment").click(function(){
            $('#preloader').show();
           var questionId = $(this).data('qpool');
           console.log('qs:' + questionId);
           $("#qpool-"+questionId).remove();
            $('#preloader').hide();
        });
    }

    function resetQuestionListView(){
        $("#questionList").html("");
    }
</script>
<?= $this->endSection() ?>


