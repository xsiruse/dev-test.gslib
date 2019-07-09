<?php

/* @particles/top-news-joomla.html.twig */
class __TwigTemplate_b57749b710a2226e8573f391a3478e9a872b715a4460cc82061b138d3e1431fc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/top-news-joomla.html.twig", 1);
        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'particle' => [$this, 'block_particle'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/partials/particle.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        $context["topnewsid"] = twig_random($this->env);
        // line 74
        $context["attr_extra"] = "";
        // line 75
        if ($this->getAttribute(($context["particle"] ?? null), "extra", [])) {
            // line 76
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["particle"] ?? null), "extra", []));
            foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
                // line 77
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["attributes"]);
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 78
                    $context["attr_extra"] = (((((($context["attr_extra"] ?? null) . " ") . twig_escape_filter($this->env, $context["key"])) . "=\"") . twig_escape_filter($this->env, $context["value"], "html_attr")) . "\"");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributes'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 83
        $context["article_settings"] = $this->getAttribute(($context["particle"] ?? null), "article", []);
        // line 84
        $context["filter"] = $this->getAttribute(($context["article_settings"] ?? null), "filter", []);
        // line 85
        $context["sort"] = $this->getAttribute(($context["article_settings"] ?? null), "sort", []);
        // line 86
        $context["limit"] = $this->getAttribute(($context["article_settings"] ?? null), "limit", []);
        // line 87
        $context["display"] = $this->getAttribute(($context["article_settings"] ?? null), "display", []);
        // line 90
        $context["category_options"] = (($this->getAttribute(($context["filter"] ?? null), "categories", [])) ? (["id" => [0 => twig_split_filter($this->env, $this->getAttribute(($context["filter"] ?? null), "categories", []), ","), 1 => 0]]) : ([]));
        // line 91
        $context["categories"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["joomla"] ?? null), "finder", [0 => "category", 1 => ($context["category_options"] ?? null)], "method"), "published", [0 => 1], "method"), "language", [], "method"), "limit", [0 => 0], "method"), "find", [], "method");
        // line 94
        if ($this->getAttribute(($context["filter"] ?? null), "articles", [])) {
            // line 95
            $context["article_options"] = (($this->getAttribute(($context["filter"] ?? null), "articles", [])) ? (["id" => [0 => twig_split_filter($this->env, twig_replace_filter($this->getAttribute(($context["filter"] ?? null), "articles", []), " ", ""), ",")]]) : ([]));
            // line 96
            $context["article_finder"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["joomla"] ?? null), "finder", [0 => "content", 1 => ($context["article_options"] ?? null)], "method"), "published", [0 => 1], "method"), "language", [], "method");
        } else {
            // line 98
            $context["article_finder"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["joomla"] ?? null), "finder", [0 => "content"], "method"), "category", [0 => ($context["categories"] ?? null)], "method"), "published", [0 => 1], "method"), "language", [], "method");
        }
        // line 101
        $context["featured"] = (($this->getAttribute(($context["filter"] ?? null), "featured", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["filter"] ?? null), "featured", []), "include")) : ("include"));
        // line 102
        if ((($context["featured"] ?? null) == "exclude")) {
            // line 103
            $this->getAttribute(($context["article_finder"] ?? null), "featured", [0 => false], "method");
        } elseif ((        // line 104
($context["featured"] ?? null) == "only")) {
            // line 105
            $this->getAttribute(($context["article_finder"] ?? null), "featured", [0 => true], "method");
        }
        // line 108
        ob_start();
        // line 109
        echo "    ";
        if (((($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")) == "style1")) {
            echo "5";
        }
        // line 110
        echo "    ";
        if (((($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")) == "style2")) {
            echo "3";
        }
        // line 111
        echo "    ";
        if (((($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")) == "style3")) {
            echo "4";
        }
        $context["limit"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 114
        $context["articles"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["article_finder"] ?? null), "order", [0 => $this->getAttribute(($context["sort"] ?? null), "orderby", []), 1 => $this->getAttribute(($context["sort"] ?? null), "ordering", [])], "method"), "limit", [0 => twig_escape_filter($this->env, ($context["limit"] ?? null))], "method"), "start", [0 => $this->getAttribute($this->getAttribute(($context["article_settings"] ?? null), "limit", []), "start", [])], "method"), "find", [], "method");
        // line 116
        ob_start();
        // line 117
        echo "    <div class=\"g-particle-intro\">
        ";
        // line 118
        if ($this->getAttribute(($context["particle"] ?? null), "mainheading", [])) {
            // line 119
            echo "            <h3 class=\"g-title g-main-title\">";
            echo $this->getAttribute(($context["particle"] ?? null), "mainheading", []);
            echo "</h3>
            <div class=\"g-title-separator ";
            // line 120
            if (($this->getAttribute(($context["particle"] ?? null), "introtext", []) == false)) {
                echo "no-intro-text";
            }
            echo "\"></div>
        ";
        }
        // line 121
        echo " 
        ";
        // line 122
        if ($this->getAttribute(($context["particle"] ?? null), "introtext", [])) {
            echo "<p class=\"g-introtext\">";
            echo $this->getAttribute(($context["particle"] ?? null), "introtext", []);
            echo "</p>";
        }
        // line 123
        echo "    </div>
";
        $context["particleheading"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 6
        echo "    ";
        if ($this->getAttribute(($context["particle"] ?? null), "enabled", [])) {
            // line 7
            echo "        ";
            $this->displayParentBlock("stylesheets", $context, $blocks);
            echo "
        <style type=\"text/css\">
            ";
            // line 9
            if (((($this->getAttribute(($context["particle"] ?? null), "layout", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "layout", []), "layout1")) : ("layout1")) == "layout1")) {
                // line 10
                echo "                .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style1 .g-top-news-main, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style2 .g-top-news-main, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style2 .g-top-news-secondary, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-main, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-secondary.g-tn2 {
                    width: 50%;
                }

                .g-inline_";
                // line 14
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style1 .g-top-news-secondary, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-secondary {
                    width: 25%;
                }
            ";
            }
            // line 18
            echo "
            ";
            // line 19
            if (((($this->getAttribute(($context["particle"] ?? null), "layout", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "layout", []), "layout1")) : ("layout1")) == "layout2")) {
                // line 20
                echo "                .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style1 .g-top-news-main, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style2 .g-top-news-main, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-main {
                    width: 75%;
                }

                .g-inline_";
                // line 24
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style1 .g-top-news-secondary, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-secondary {
                    width: 12.5%;
                }

                .g-inline_";
                // line 28
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style2 .g-top-news-secondary, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-secondary.g-tn2 {
                    width: 25%;
                }
            ";
            }
            // line 32
            echo "
            ";
            // line 33
            if (((($this->getAttribute(($context["particle"] ?? null), "layout", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "layout", []), "layout1")) : ("layout1")) == "layout3")) {
                // line 34
                echo "                .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style1 .g-top-news-main, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style2 .g-top-news-main, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-main {
                    width: 66.6666%;
                }

                .g-inline_";
                // line 38
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style1 .g-top-news-secondary, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-secondary {
                    width: 16.6666%;
                }

                .g-inline_";
                // line 42
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style2 .g-top-news-secondary, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-secondary.g-tn2 {
                    width: 33.3333%;
                }
            ";
            }
            // line 46
            echo "
            ";
            // line 47
            if (((($this->getAttribute(($context["particle"] ?? null), "layout", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "layout", []), "layout1")) : ("layout1")) == "layout4")) {
                // line 48
                echo "                .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style1 .g-top-news-main, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style2 .g-top-news-main, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-main {
                    width: 25%;
                }

                .g-inline_";
                // line 52
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style1 .g-top-news-secondary, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-secondary {
                    width: 37.5%;
                }

                .g-inline_";
                // line 56
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style2 .g-top-news-secondary, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-secondary.g-tn2 {
                    width: 75%;
                }
            ";
            }
            // line 60
            echo "
            ";
            // line 61
            if (((($this->getAttribute(($context["particle"] ?? null), "layout", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "layout", []), "layout1")) : ("layout1")) == "layout5")) {
                // line 62
                echo "                .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style1 .g-top-news-main, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style1 .g-top-news-secondary, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style2 .g-top-news-main, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-main, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-secondary {
                    width: 33.3333%;
                }

                .g-inline_";
                // line 66
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style2 .g-top-news-secondary, .g-inline_";
                echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
                echo ".style3 .g-top-news-secondary.g-tn2 {
                    width: 66.6666%;
                }
            ";
            }
            // line 70
            echo "        </style>
    ";
        }
    }

    // line 126
    public function block_particle($context, array $blocks = [])
    {
        // line 127
        echo "    <div class=\"g-top-news ";
        echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")));
        echo " g-inline_";
        echo twig_escape_filter($this->env, ($context["topnewsid"] ?? null), "html", null, true);
        if ($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "css", []), "class", [])) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["particle"] ?? null), "css", []), "class", []));
        }
        if (((($this->getAttribute(($context["particle"] ?? null), "gutter", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "gutter", []), "disabled")) : ("disabled")) == "enabled")) {
            echo " gutter-enabled";
        } else {
            echo " gutter-disabled";
        }
        echo "\" ";
        if ($this->getAttribute(($context["particle"] ?? null), "extra", [])) {
            echo ($context["attr_extra"] ?? null);
        }
        echo ">
        ";
        // line 128
        if (($this->getAttribute(($context["particle"] ?? null), "mainheading", []) || $this->getAttribute(($context["particle"] ?? null), "introtext", []))) {
            // line 129
            echo "            ";
            echo twig_escape_filter($this->env, ($context["particleheading"] ?? null), "html", null, true);
            echo "
        ";
        }
        // line 131
        echo "        
        <div class=\"g-top-news-container clearfix\">

            ";
        // line 134
        $context["article_number"] = 0;
        // line 135
        echo "
            ";
        // line 136
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["articles"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 137
            echo "                ";
            ob_start();
            // line 138
            if (($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", []) && ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) == "intro"))) {
                // line 139
                echo "background-image: url(";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", [])), "html", null, true);
                echo ")";
            } elseif (($this->getAttribute($this->getAttribute(            // line 140
$context["article"], "images", []), "image_fulltext", []) && ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) == "full"))) {
                // line 141
                echo "background-image: url(";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_fulltext", [])), "html", null, true);
                echo ")";
            }
            $context["articleimage"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 144
            echo "
                ";
            // line 145
            $context["article_number"] = (($context["article_number"] ?? null) + 1);
            // line 146
            echo "
                ";
            // line 147
            ob_start();
            // line 148
            if ($this->getAttribute($context["loop"], "first", [])) {
                // line 149
                echo "g-top-news-main g-tn";
                echo twig_escape_filter($this->env, ($context["article_number"] ?? null), "html", null, true);
            } else {
                // line 151
                echo "g-top-news-secondary g-tn";
                echo twig_escape_filter($this->env, ($context["article_number"] ?? null), "html", null, true);
            }
            $context["articleclass"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 154
            echo "
                ";
            // line 155
            ob_start();
            // line 156
            if ($this->getAttribute($context["loop"], "first", [])) {
                // line 157
                echo "height: ";
                echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "height", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "height", []), "450")) : ("450")));
                echo "px";
            } else {
                // line 159
                echo "height: ";
                echo twig_escape_filter($this->env, (int) floor((twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "height", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "height", []), "450")) : ("450"))) / 2)), "html", null, true);
                echo "px";
            }
            $context["articleheight"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 162
            echo "
                ";
            // line 163
            $context["category_link"] = ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "category", []), "enabled", []) == "link");
            // line 164
            echo "                ";
            $context["article_text"] = ((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "type", []) == "intro")) ? ($this->getAttribute($context["article"], "introtext", [])) : ($this->getAttribute($context["article"], "text", [])));
            // line 165
            echo "
                <div class=\"g-top-news-item ";
            // line 166
            echo twig_escape_filter($this->env, ($context["articleclass"] ?? null), "html", null, true);
            if (((($this->getAttribute(($context["particle"] ?? null), "gutter", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "gutter", []), "disabled")) : ("disabled")) == "enabled")) {
                echo " g-content";
            }
            echo "\" style=\"";
            echo twig_escape_filter($this->env, ($context["articleheight"] ?? null), "html", null, true);
            echo ";\">
                    <div class=\"g-top-news-item-inner\" style=\"";
            // line 167
            echo twig_escape_filter($this->env, ($context["articleimage"] ?? null), "html", null, true);
            echo ";\">
                        <div class=\"g-top-news-item-image\">
                            <a href=\"";
            // line 169
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "route", []), "html", null, true);
            echo "\"></a>
                        </div>
                        <div class=\"g-top-news-item-info\">
                            ";
            // line 172
            if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "category", []), "enabled", [])) {
                // line 173
                echo "                                <span class=\"g-article-category\">
                                    ";
                // line 174
                $context["cat"] = twig_last($this->env, $this->getAttribute($context["article"], "categories", []));
                // line 175
                echo "                                    ";
                if (($context["category_link"] ?? null)) {
                    // line 176
                    echo "                                        <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "route", []), "html", null, true);
                    echo "\">
                                            <span class=\"g-cat-";
                    // line 177
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "alias", [])), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "title", []), "html", null, true);
                    echo "</span>
                                        </a>
                                    ";
                } else {
                    // line 180
                    echo "                                        <span class=\"g-cat-";
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "alias", [])), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "title", []), "html", null, true);
                    echo "</span>
                                    ";
                }
                // line 182
                echo "                                </span>                                      
                            ";
            }
            // line 184
            echo "
                            ";
            // line 185
            if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "enabled", [])) {
                // line 186
                echo "                                <h4 class=\"g-article-title\">
                                    <a href=\"";
                // line 187
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "route", []), "html", null, true);
                echo "\">";
                // line 188
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", [])) ? ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateText($this->getAttribute($context["article"], "title", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", []))) : ($this->getAttribute($context["article"], "title", []))), "html", null, true);
                // line 189
                echo "</a>
                                </h4>
                            ";
            }
            // line 192
            echo "
                            ";
            // line 193
            if ((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "enabled", []) || $this->getAttribute($this->getAttribute(($context["display"] ?? null), "author", []), "enabled", [])) || $this->getAttribute($this->getAttribute(($context["display"] ?? null), "hits", []), "enabled", []))) {
                // line 194
                echo "                                <div class=\"g-article-details\">
                                    ";
                // line 195
                if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "enabled", [])) {
                    // line 196
                    echo "                                        <span class=\"g-article-date\">";
                    // line 197
                    if (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "enabled", []) == "published")) {
                        // line 198
                        echo "<i class=\"fa fa-clock-o\"></i>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('date')->getCallable(), [$this->env, $this->getAttribute($context["article"], "publish_up", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "format", [])]), "html", null, true);
                    } elseif (($this->getAttribute($this->getAttribute(                    // line 199
($context["display"] ?? null), "date", []), "enabled", []) == "modified")) {
                        // line 200
                        echo "<i class=\"fa fa-clock-o\"></i>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('date')->getCallable(), [$this->env, $this->getAttribute($context["article"], "modified", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "format", [])]), "html", null, true);
                    } else {
                        // line 202
                        echo "<i class=\"fa fa-clock-o\"></i>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('date')->getCallable(), [$this->env, $this->getAttribute($context["article"], "created", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "format", [])]), "html", null, true);
                    }
                    // line 204
                    echo "</span>
                                    ";
                }
                // line 206
                echo "
                                    ";
                // line 207
                if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "author", []), "enabled", [])) {
                    // line 208
                    echo "                                        <span class=\"g-article-author\">";
                    // line 209
                    if (((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "author", [], "any", false, true), "enabled", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["display"] ?? null), "author", [], "any", false, true), "enabled", []), "show")) : ("show")) == "show")) {
                        // line 210
                        echo "<i class=\"fa fa-user\"></i>";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["article"], "author", []), "name", []), "html", null, true);
                    } else {
                        // line 212
                        if ($this->getAttribute($context["article"], "created_by_alias", [])) {
                            // line 213
                            echo "                                                    <i class=\"fa fa-user\"></i>";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "created_by_alias", []), "html", null, true);
                        } else {
                            // line 215
                            echo "<i class=\"fa fa-user\"></i>";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["article"], "author", []), "name", []), "html", null, true);
                        }
                    }
                    // line 218
                    echo "</span>
                                    ";
                }
                // line 220
                echo "
                                    ";
                // line 221
                if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "hits", []), "enabled", [])) {
                    // line 222
                    echo "                                        <span class=\"g-article-hits\">
                                            <i class=\"fa fa-eye\"></i>";
                    // line 223
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "hits", []), "html", null, true);
                    // line 224
                    echo "</span>
                                    ";
                }
                // line 226
                echo "                                </div>
                            ";
            }
            // line 228
            echo "
                            ";
            // line 229
            if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "type", [])) {
                // line 230
                echo "                                <div class=\"g-article-text\">";
                // line 231
                if (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "formatting", []) == "text")) {
                    // line 232
                    echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateText(($context["article_text"] ?? null), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "limit", []));
                } else {
                    // line 234
                    echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->htmlFilter($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateHtml($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "filter", [0 => ($context["article_text"] ?? null)], "method"), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "limit", [])));
                }
                // line 236
                echo "</div>
                            ";
            }
            // line 238
            echo "                        </div>
                    </div>
                </div>

            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 243
        echo "
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@particles/top-news-joomla.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  634 => 243,  616 => 238,  612 => 236,  609 => 234,  606 => 232,  604 => 231,  602 => 230,  600 => 229,  597 => 228,  593 => 226,  589 => 224,  587 => 223,  584 => 222,  582 => 221,  579 => 220,  575 => 218,  570 => 215,  566 => 213,  564 => 212,  560 => 210,  558 => 209,  556 => 208,  554 => 207,  551 => 206,  547 => 204,  543 => 202,  539 => 200,  537 => 199,  534 => 198,  532 => 197,  530 => 196,  528 => 195,  525 => 194,  523 => 193,  520 => 192,  515 => 189,  513 => 188,  510 => 187,  507 => 186,  505 => 185,  502 => 184,  498 => 182,  490 => 180,  482 => 177,  477 => 176,  474 => 175,  472 => 174,  469 => 173,  467 => 172,  461 => 169,  456 => 167,  447 => 166,  444 => 165,  441 => 164,  439 => 163,  436 => 162,  430 => 159,  425 => 157,  423 => 156,  421 => 155,  418 => 154,  413 => 151,  409 => 149,  407 => 148,  405 => 147,  402 => 146,  400 => 145,  397 => 144,  391 => 141,  389 => 140,  385 => 139,  383 => 138,  380 => 137,  363 => 136,  360 => 135,  358 => 134,  353 => 131,  347 => 129,  345 => 128,  325 => 127,  322 => 126,  316 => 70,  307 => 66,  291 => 62,  289 => 61,  286 => 60,  277 => 56,  268 => 52,  256 => 48,  254 => 47,  251 => 46,  242 => 42,  233 => 38,  221 => 34,  219 => 33,  216 => 32,  207 => 28,  198 => 24,  186 => 20,  184 => 19,  181 => 18,  172 => 14,  156 => 10,  154 => 9,  148 => 7,  145 => 6,  142 => 5,  138 => 1,  134 => 123,  128 => 122,  125 => 121,  118 => 120,  113 => 119,  111 => 118,  108 => 117,  106 => 116,  104 => 114,  98 => 111,  93 => 110,  88 => 109,  86 => 108,  83 => 105,  81 => 104,  79 => 103,  77 => 102,  75 => 101,  72 => 98,  69 => 96,  67 => 95,  65 => 94,  63 => 91,  61 => 90,  59 => 87,  57 => 86,  55 => 85,  53 => 84,  51 => 83,  40 => 78,  36 => 77,  32 => 76,  30 => 75,  28 => 74,  26 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/top-news-joomla.html.twig", "/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/top-news-joomla.html.twig");
    }
}
