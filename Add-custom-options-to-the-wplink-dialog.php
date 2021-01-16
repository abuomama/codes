add_action('admin_print_footer_scripts', function() {
    ?>
    <script type="text/javascript">
    /* <![CDATA[ */
    (function($) {
      $(function() {
        $(document).on("wplink-open", function(inputs_wrap) {
          $("#link-options").not('.link-nofollow-active').append(
            $("<div></div>").addClass("link-nofollow").html(
              $("<label></label>").html([
                $("<span></span>"),
                $("<input></input>").attr({"type": "checkbox", "id": "wp-link-nofollow"}),
                "rel=\"nofollow\""
              ])
            )
          ).addClass('link-nofollow-active');
          if (wpLink && typeof(wpLink.getAttrs) == "function") {
            wpLink.getAttrs = function() {
              wpLink.correctURL();
              <?php /* [attention] Do not use inputs.url.val() or any input.* */ ?>
              return {
                href: $.trim( $("#wp-link-url").val() ),
                target: $("#wp-link-target").prop("checked") ? "_blank" : null,
                rel: $("#wp-link-nofollow").prop("checked") ? "nofollow" : null
              };
            };
          }
        });
      });
    })(jQuery);
    /* ]]> */
    </script>
    <?php
}, 45);
