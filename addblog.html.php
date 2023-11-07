<section>
  <div class="container h-100">
    <div class="row d-flex h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create a post</p>
              </div>
            </div>
                <form action="addblog.php" method="post" class="mx-1 mx-md-4" enctype='multipart/form-data'>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input placeholder="Enter a creative title..." type="text" id="form3Example1c" class="form-control" name="title" required /></br>
                      <textarea placeholder="Text (optional)" class="form-control" id="exampleFormControlTextarea" rows="3" name="content" ></textarea></br>
                      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image[]"  multiple>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="createpost" class="btn btn-primary btn-lg">Post</button>
                  </div>
                </form>
          </div>
        </div>
      </div>
</section>