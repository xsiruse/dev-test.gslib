<?php

/* @particles/paypaldonate.html.twig */
class __TwigTemplate_7814460dd334b743bc664b4621bb268ec621eebeb710c4661826ed7a65823e65 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/paypaldonate.html.twig", 1);
        $this->blocks = [
            'particle' => [$this, 'block_particle'],
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
    public function block_particle($context, array $blocks = [])
    {
        // line 4
        echo "    ";
        if ($this->getAttribute(($context["particle"] ?? null), "enabled", [])) {
            // line 5
            echo "        ";
            $context["rand"] = twig_random($this->env);
            // line 6
            echo "        <form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\">
            <input type=\"hidden\" name=\"business\" value=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "email", []), "html", null, true);
            echo "\">
            <input type=\"hidden\" name=\"cmd\" value=\"_donations\">
            <input type=\"hidden\" name=\"item_name\" value=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "name", []), "html", null, true);
            echo "\">
            <input type=\"hidden\" name=\"item_number\" value=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "campaign", []), "html", null, true);
            echo "\">
            <input type=\"hidden\" name=\"currency_code\" value=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "currency", []), "html", null, true);
            echo "\">
            ";
            // line 12
            if ($this->getAttribute(($context["particle"] ?? null), "fixedamount", [])) {
                // line 13
                echo "                <input type=\"hidden\" placeholder=\"Amount\" name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "fixedamount", []), "html", null, true);
                echo "\"/>
            ";
            }
            // line 15
            echo "
            ";
            // line 16
            if (($this->getAttribute(($context["particle"] ?? null), "currency", []) == "USD")) {
                // line 17
                echo "                ";
                $context["currency"] = "\$";
                // line 18
                echo "            ";
            } elseif (($this->getAttribute(($context["particle"] ?? null), "currency", []) == "GBP")) {
                // line 19
                echo "                ";
                $context["currency"] = "£";
                // line 20
                echo "            ";
            } elseif (($this->getAttribute(($context["particle"] ?? null), "currency", []) == "JPY")) {
                // line 21
                echo "                ";
                $context["currency"] = "¥";
                // line 22
                echo "            ";
            } elseif (($this->getAttribute(($context["particle"] ?? null), "currency", []) == "EUR")) {
                // line 23
                echo "                ";
                $context["currency"] = "€";
                // line 24
                echo "            ";
            } else {
                // line 25
                echo "              ";
                $context["currency"] = $this->getAttribute(($context["particle"] ?? null), "currency", []);
                // line 26
                echo "            ";
            }
            // line 27
            echo "
            <!-- Display the payment button. -->
            <div class=\"jl-paypal-donate\">
                <div class=\"jl-donate-container\">
                  ";
            // line 31
            if ($this->getAttribute(($context["particle"] ?? null), "showamount", [])) {
                // line 32
                echo "                    ";
                if (($this->getAttribute(($context["particle"] ?? null), "fixedamount", []) == "")) {
                    // line 33
                    echo "                      <input type=\"text\" placeholder=\"Enter amount (";
                    echo twig_escape_filter($this->env, ($context["currency"] ?? null), "html", null, true);
                    echo ")\" name=\"amount\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "fixedamount", []), "html", null, true);
                    echo "\"/>
                    ";
                } else {
                    // line 35
                    echo "                    <div class=\"jl-donate-amount\">
                      ";
                    // line 36
                    echo twig_escape_filter($this->env, ($context["currency"] ?? null), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "fixedamount", []), "html", null, true);
                    echo "
                    </div>
                      <input type=\"hidden\" name=\"amount\" value=\"";
                    // line 38
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "fixedamount", []), "html", null, true);
                    echo "\"/>
                    ";
                }
                // line 40
                echo "                  ";
            }
            // line 41
            echo "                  ";
            $context["image"] = ((($this->getAttribute(($context["particle"] ?? null), "image", []) == "")) ? ((("gantry-media://paypal/" . $this->getAttribute(($context["particle"] ?? null), "images", [])) . ".png")) : ($this->getAttribute(($context["particle"] ?? null), "image", [])));
            // line 42
            echo "                  <input class=\"jl-donate-button\" type=\"image\" name=\"submit\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc(($context["image"] ?? null)), "html", null, true);
            echo "\" alt=\"Donate\"/>
                  ";
            // line 43
            if ($this->getAttribute(($context["particle"] ?? null), "creditcard", [])) {
                // line 44
                echo "                    <div class=\"jl-donate-cards-image\">
                        <img src=\"";
                // line 45
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-media://paypal/logo_ccVisa.gif"), "html", null, true);
                echo "\" class=\"marginBottom ccLogo V\" alt=\"Visa\" title=\"Visa\" border=\"0\"><wbr>
                        <img src=\"";
                // line 46
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-media://paypal/logo_ccMC.gif"), "html", null, true);
                echo "\" class=\"marginBottom ccLogo M\" alt=\"Mastercard \" title=\"\" border=\"0\"><wbr>
                        <img src=\"";
                // line 47
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-media://paypal/logo_ccAmex.gif"), "html", null, true);
                echo "\" class=\"marginBottom ccLogo A\" alt=\"American Express \" border=\"0\"><wbr>
                        <img src=\"";
                // line 48
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-media://paypal/logo_ccDiscover.gif"), "html", null, true);
                echo "\" class=\"marginBottom ccLogo D\" alt=\"Discover\" title=\"Discover\" border=\"0\"><wbr>
                        <img src=\"";
                // line 49
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-media://paypal/PayPal_mark_37x23.gif"), "html", null, true);
                echo "\" class=\"marginBottom\" alt=\"PayPal \" border=\"0\"><wbr>
                    </div>
                    ";
            }
            // line 52
            echo "                </div>
            </div>
        </form>

    ";
        }
    }

    public function getTemplateName()
    {
        return "@particles/paypaldonate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 52,  166 => 49,  162 => 48,  158 => 47,  154 => 46,  150 => 45,  147 => 44,  145 => 43,  140 => 42,  137 => 41,  134 => 40,  129 => 38,  122 => 36,  119 => 35,  111 => 33,  108 => 32,  106 => 31,  100 => 27,  97 => 26,  94 => 25,  91 => 24,  88 => 23,  85 => 22,  82 => 21,  79 => 20,  76 => 19,  73 => 18,  70 => 17,  68 => 16,  65 => 15,  59 => 13,  57 => 12,  53 => 11,  49 => 10,  45 => 9,  40 => 7,  37 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/paypaldonate.html.twig", "/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/paypaldonate.html.twig");
    }
}
