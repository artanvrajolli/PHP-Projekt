

<div class="row justify-content-center">
        <div class="col-md-10 shadow_b m-2">
        <div class="mt-2">
        <?=$msg?>
        </div>
          <h4 class="mb-3">Form post</h4>
          <form class="needs-validation" novalidate="" method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Title</label>
                <input name="title" type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid Title is required.
                </div>
              </div>
            </div>
            <div class="form-group">
            <label>Description</label>
            <div class="row col-md-12 mb-2 ">
							<button class="btn btn-info ml-2" type="button" value="Bold" name="bold" onclick="add_bbcode('[b]text[/b]')" style="display:inline-block;" /><b>Bold</b></button>
							<button class="btn btn-info ml-2" type="button" value="Underline" name="underline" onclick="add_bbcode( '[u]text[/u]')" style="display:inline-block;" /><u>Underline</u></button>
							<button class="btn btn-info ml-2" type="button" value="Italic" name="italic" onclick="add_bbcode( '[i]text[/i]')" style="display:inline-block;" /><em>Italic</em></button>
							<button class="btn btn-info ml-2" type="button" value="Link" name="link" onclick="add_bbcode( '[url=http:\/\/url.com/]text[/url]')" style="50px;display:inline-block;" />Link</button>
							<button class="btn btn-info ml-2" type="button" value="Center" name="center" onclick="add_bbcode('[center]text[/center]')" style="display:inline-block;" />Center</button>
							<button class="btn btn-info ml-2" type="button" value="Image" name="image" onclick="add_bbcode('[img]URL[/img]')" style="display:inline-block;" />Image</button>
              <button class="btn btn-info ml-2" type="button" value="Size" name="size" onclick="add_bbcode('[size=5]text[/size]')" style="display:inline-block;" />Size</button>
              <button class="btn btn-info ml-2" type="button" value="Color" name="color" onclick="add_bbcode( '[color=red]text[/color]')" style="display:inline-block;" />Color</button>
              <button class="btn btn-info ml-2" type="button" value="Table" name="color" onclick="add_bbcode( '[table]\n[tr][td]data1[/td][td]data2[/td][/tr]\n[tr][td]data1[/td][td]data2[/td][/tr]\n[/table]')" style="display:inline-block;" />Table</button>
              <button class="btn btn-info ml-2" type="button" value="Code" name="code" onclick="add_bbcode( '[code] CODE [/code]')" style="display:inline-block;" />Code</button>
              </div>
                <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="15"></textarea>
            </div>
            <hr class="mb-4 ">
            <div class="row justify-content-between mx-2">
            <button class="btn btn-primary col-md-5 " name="add_post" type="submit">Add Post</button>
            </div>
            <hr class="mb-4">
          </form>
        </div>
      </div>

<script>
function add_bbcode(tag){
		document.getElementById("exampleFormControlTextarea1").value = document.getElementById("exampleFormControlTextarea1").value + tag; 
    console.log("added:"+tag);
}
</script>