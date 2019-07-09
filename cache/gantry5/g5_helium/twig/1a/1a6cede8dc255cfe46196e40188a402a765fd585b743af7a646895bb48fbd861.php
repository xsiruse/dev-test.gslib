<?php

/* @particles/backtotop.html.twig */
class __TwigTemplate_b7f571b3ea520df9f272733f5f8f95838bb4c17eb5e87923c6f9e43b48f89aa8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/backtotop.html.twig", 1);
        $this->blocks = [
            'javascript_footer' => [$this, 'block_javascript_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/partials/particle.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_javascript_footer($context, array $blocks = [])
    {
        // line 4
        echo "  ";
        $this->getAttribute(($context["gantry"] ?? null), "load", [0 => "jquery"], "method");
        // line 5
        echo "  <script>
  jQuery(function(\$) {
    var a = document.createElement('a');
    a.className += 'back-to-top';
    a.title = 'Back to top';
    a.innerHTML = '";
        // line 10
        if ($this->getAttribute(($context["particle"] ?? null), "icon", [])) {
            echo "<i class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "icon", []), "html", null, true);
            echo "\"></i> ";
        } else {
            echo " &uarr; ";
        }
        echo "';

    document.getElementsByTagName('body')[0].appendChild(a);
      if (\$('.back-to-top').length) {
          var scrollTrigger = 100, // px
              backToTop = function() {
                  var scrollTop = \$(window).scrollTop();
                  if (scrollTop > scrollTrigger) {
                      \$('.back-to-top').removeClass('backHide');
                  } else {
                      \$('.back-to-top').addClass('backHide');
                  }
              };
          backToTop();
          \$(window).on('scroll', function() {
              backToTop();
          });
          \$('.back-to-top').on('click', function(e) {
              e.preventDefault();
              \$('html,body').animate({
                  scrollTop: 0
              }, 700);
          });
      }
    });
  </script>
";
    }

    public function getTemplateName()
    {
        return "@particles/backtotop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 10,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/backtotop.html.twig", "/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/backtotop.html.twig");
    }
}
