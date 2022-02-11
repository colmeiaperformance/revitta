<?php
if( get_field('contact_form') ) {  
$cf_title = get_field('cf_title', 'option');
$cf_description = get_field('cf_description', 'option');
$form_script = get_field('form_script', 'option');
$cf_subject_list_title = get_field('cf_subject_list_title', 'option');
$subject_list_left = get_field('subject_list_left', 'option');
$subject_list_right = get_field('subject_list_right', 'option');
$cf_button_text = get_field('cf_button_text', 'option');
$form_counter = 1;
?>

<section class="customized-consultation">
  <div class="container pt-lg-5 pb-5">
    <h2 class="pt-4 pb-3 mt-1 text-uppercase text-center"><?php if ($cf_title) : echo $cf_title; endif; ?></h2>
    <p class="text-black text-center my-0 mx-auto"><?php if ($cf_description) : echo $cf_description; endif; ?></p>
    <form class="needs-validation mt-lg-5 mt-4 pt-lg-3" novalidate>
      <div class="row">
        <div class="col-md-6 pe-lg-4">
          <?php if ($form_script) : echo $form_script; endif; ?>
          <div class="mb-4">
            <input type="text" class="form-control" id="inputName" placeholder="Full name" required>
          </div>
          <div class="mb-4">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Email" required>
          </div>
          <div class="mb-4">
            <input type="tel" id="phone" class="form-control" placeholder="Phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
          </div>
          <div class="mb-4">
            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Message" rows="5"></textarea>
          </div>
        </div>
        <div class="col-md-6 ps-lg-5">
          <h3 class="text-dark text-center"><?php if ($cf_subject_list_title) : echo $cf_subject_list_title; endif; ?>
          </h3>
          <div class="row">
            <div class="col-6">

              <?php foreach ($subject_list_left as $sll) { ?>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value=""
                  id="flexCheckDefault<?php echo $form_counter; ?>">
                <label class="form-check-label" for="flexCheckDefault<?php echo $form_counter; ?>">
                  <?php echo $sll['cf_left_item']; ?>
                </label>
              </div>

              <?php 
            $form_counter++;
            } ?>
            </div>

            <div class="col-6">

              <?php foreach ($subject_list_right as $slr) { ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value=""
                  id="flexCheckDefault<?php echo $form_counter; ?>">
                <label class="form-check-label" for="flexCheckDefault<?php echo $form_counter; ?>">
                  <?php echo $slr['cf_right_item']; ?>
                </label>
              </div>

              <?php 
            $form_counter++;
            } ?>
            </div>

          </div>


        </div>
      </div>
      <div class="mt-3 text-center">
        <button type="submit"
          class="btn text-uppercase"><?php if ($cf_button_text) : echo $cf_button_text; else : _e('Book now', 'revitta-domain'); endif; ?></button>
      </div>
    </form>
  </div>
</section>

<?php }