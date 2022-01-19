 <aside class="aside col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">About</h4>
          <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
        </div>

        <div class="search p-4">
           <form method="get" role="search" id="searchform" class="d-flex" action="<?php bloginfo('home'); ?>/">
              <input type="text" name="s" id="s"  class="form-control me-2" placeholder="Pesquisa" aria-label="Pesquisa">
              <input type="submit" name="submit"  id="search-button" value="Ok" class="btn btn-outline-primary">
           </form>
        <div>

        <div class="p-4">
          <h4 class="fst-italic">Category</h4>
          <?php wp_list_categories( array(
            'title_li'    => '',
            'hide_empty'  => false
            ) );
        ?>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Most popular</h4>
          <?php
        if ( function_exists('wpp_get_mostpopular') ) { ?>
            <?php
            /* Get up to the top 5 commented posts from the last 7 days */
            wpp_get_mostpopular(array(
                'limit'     => 5,
                'post_html' => '<dd><a href="{url}">{title}</a></dd>'
            ));
        }
        ?>
        </div>
      </div>
    </aside>
