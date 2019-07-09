<?php

/* @particles/contentarray.html.twig */
class __TwigTemplate_9d5c5c9f375773f654a54a0f6712b9473bd2524fc611da3d4fe8050a2fc42474 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/contentarray.html.twig", 1);
        $this->blocks = [
            'particle' => [$this, 'block_particle'],
            'javascript_footer' => [$this, 'block_javascript_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/partials/particle.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        $context["attr_extra"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->attributeArrayFilter($this->getAttribute(($context["particle"] ?? null), "extra", []));
        // line 4
        $context["article_settings"] = $this->getAttribute(($context["particle"] ?? null), "article", []);
        // line 5
        $context["filter"] = $this->getAttribute(($context["article_settings"] ?? null), "filter", []);
        // line 6
        $context["sort"] = $this->getAttribute(($context["article_settings"] ?? null), "sort", []);
        // line 7
        $context["limit"] = $this->getAttribute(($context["article_settings"] ?? null), "limit", []);
        // line 8
        $context["display"] = $this->getAttribute(($context["article_settings"] ?? null), "display", []);
        // line 11
        $context["category_options"] = (($this->getAttribute(($context["filter"] ?? null), "categories", [])) ? (["id" => [0 => twig_split_filter($this->env, $this->getAttribute(($context["filter"] ?? null), "categories", []), ","), 1 => 0]]) : ([]));
        // line 12
        $context["categories"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["joomla"] ?? null), "finder", [0 => "category", 1 => ($context["category_options"] ?? null)], "method"), "published", [0 => 1], "method"), "language", [], "method"), "limit", [0 => 0], "method"), "find", [], "method");
        // line 15
        if ($this->getAttribute(($context["filter"] ?? null), "articles", [])) {
            // line 16
            $context["article_options"] = (($this->getAttribute(($context["filter"] ?? null), "articles", [])) ? (["id" => [0 => twig_split_filter($this->env, twig_replace_filter($this->getAttribute(($context["filter"] ?? null), "articles", []), [" " => ""]), ",")]]) : ([]));
            // line 17
            $context["article_finder"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["joomla"] ?? null), "finder", [0 => "content", 1 => ($context["article_options"] ?? null)], "method"), "published", [0 => 1], "method"), "language", [], "method");
        } else {
            // line 19
            $context["article_finder"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["joomla"] ?? null), "finder", [0 => "content"], "method"), "category", [0 => ($context["categories"] ?? null)], "method"), "published", [0 => 1], "method"), "language", [], "method");
        }
        // line 22
        $context["featured"] = (($this->getAttribute(($context["filter"] ?? null), "featured", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["filter"] ?? null), "featured", []), "include")) : ("include"));
        // line 23
        if ((($context["featured"] ?? null) == "exclude")) {
            // line 24
            $this->getAttribute(($context["article_finder"] ?? null), "featured", [0 => false], "method");
        } elseif ((        // line 25
($context["featured"] ?? null) == "only")) {
            // line 26
            $this->getAttribute(($context["article_finder"] ?? null), "featured", [0 => true], "method");
        }
        // line 29
        $context["start"] = ($this->getAttribute(($context["limit"] ?? null), "start", []) + max(0, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->intFilter($this->getAttribute(($context["ajax"] ?? null), "start", []))));
        // line 30
        $this->getAttribute($this->getAttribute($this->getAttribute(($context["article_finder"] ?? null), "order", [0 => $this->getAttribute(($context["sort"] ?? null), "orderby", []), 1 => $this->getAttribute(($context["sort"] ?? null), "ordering", [])], "method"), "limit", [0 => $this->getAttribute(($context["limit"] ?? null), "total", [])], "method"), "start", [0 => ($context["start"] ?? null)], "method");
        // line 31
        $context["total"] = $this->getAttribute(($context["article_finder"] ?? null), "count", [], "method");
        // line 32
        $context["articles"] = $this->getAttribute(($context["article_finder"] ?? null), "find", [], "method");
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 34
    public function block_particle($context, array $blocks = [])
    {
        // line 35
        echo "
    ";
        // line 37
        echo "    <div class=\"g-content-array g-joomla-articles";
        if ($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "css", []), "class", [])) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["particle"] ?? null), "css", []), "class", []), "html", null, true);
        }
        echo "\"";
        echo ($context["attr_extra"] ?? null);
        echo ">

        ";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_array_batch(($context["articles"] ?? null), $this->getAttribute(($context["limit"] ?? null), "columns", [])));
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 40
            echo "            <div class=\"g-grid\">
                ";
            // line 41
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["column"]);
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 42
                echo "
                    <div class=\"g-block\">
                        <div class=\"g-content\">
                            <div class=\"g-array-item\">
                                ";
                // line 46
                if (($this->getAttribute(($context["display"] ?? null), "edit", []) && $this->getAttribute($context["article"], "edit", []))) {
                    // line 47
                    echo "                                    <a class=\"g-array-item-edit\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "edit", []), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("COM_CONTENT_FORM_EDIT_ARTICLE"), "html", null, true);
                    echo "</a>
                                ";
                }
                // line 49
                echo "                                ";
                if ((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) && $this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", [])) || $this->getAttribute($this->getAttribute($context["article"], "images", []), "image_fulltext", []))) {
                    // line 50
                    echo "                                    ";
                    if ((($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", []) && ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) == "intro")) || ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) == "show"))) {
                        // line 51
                        echo "                                        <div class=\"g-array-item-image\">
                                            <a href=\"";
                        // line 52
                        echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "route", []), "html", null, true);
                        echo "\">
                                                <img src=\"";
                        // line 53
                        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", [])), "html", null, true);
                        echo "\" ";
                        echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->imageSize($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", []));
                        echo " alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro_alt", []), "html", null, true);
                        echo "\" />
                                            </a>
                                        </div>
                                    ";
                    } elseif (($this->getAttribute($this->getAttribute(                    // line 56
$context["article"], "images", []), "image_fulltext", []) && ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) == "full"))) {
                        // line 57
                        echo "                                        <div class=\"g-array-item-image\">
                                            <a href=\"";
                        // line 58
                        echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "route", []), "html", null, true);
                        echo "\">
                                                <img src=\"";
                        // line 59
                        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_fulltext", [])), "html", null, true);
                        echo "\" ";
                        echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->imageSize($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_fulltext", []));
                        echo " alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["article"], "images", []), "image_fulltext_alt", []), "html", null, true);
                        echo "\" />
                                            </a>
                                        </div>
                                    ";
                    }
                    // line 63
                    echo "                                ";
                }
                // line 64
                echo "
                                ";
                // line 65
                if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "enabled", [])) {
                    // line 66
                    echo "                                    <div class=\"g-array-item-title\">
                                        <h3 class=\"g-item-title\">
                                            <a href=\"";
                    // line 68
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "route", []), "html", null, true);
                    echo "\">
                                                ";
                    // line 69
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", [])) ? ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateText($this->getAttribute($context["article"], "title", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", []))) : ($this->getAttribute($context["article"], "title", []))), "html", null, true);
                    echo "
                                            </a>
                                        </h3>
                                    </div>
                                ";
                }
                // line 74
                echo "
                                ";
                // line 75
                if (((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "enabled", []) || $this->getAttribute($this->getAttribute(($context["display"] ?? null), "author", []), "enabled", [])) || $this->getAttribute($this->getAttribute(($context["display"] ?? null), "category", []), "enabled", [])) || $this->getAttribute($this->getAttribute(($context["display"] ?? null), "hits", []), "enabled", []))) {
                    // line 76
                    echo "                                    <div class=\"g-array-item-details\">
                                        ";
                    // line 77
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "enabled", [])) {
                        // line 78
                        echo "                                            <span class=\"g-array-item-date\">
                                                ";
                        // line 79
                        if (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "enabled", []) == "published")) {
                            // line 80
                            echo "                                                    <i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i>";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('date')->getCallable(), [$this->env, $this->getAttribute($context["article"], "publish_up", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "format", [])]), "html", null, true);
                            echo "
                                                ";
                        } elseif (($this->getAttribute($this->getAttribute(                        // line 81
($context["display"] ?? null), "date", []), "enabled", []) == "modified")) {
                            // line 82
                            echo "                                                    <i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i>";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('date')->getCallable(), [$this->env, $this->getAttribute($context["article"], "modified", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "format", [])]), "html", null, true);
                            echo "
                                                ";
                        } else {
                            // line 84
                            echo "                                                    <i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i>";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('date')->getCallable(), [$this->env, $this->getAttribute($context["article"], "created", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "format", [])]), "html", null, true);
                            echo "
                                                ";
                        }
                        // line 86
                        echo "                                            </span>
                                        ";
                    }
                    // line 88
                    echo "
                                        ";
                    // line 89
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "author", []), "enabled", [])) {
                        // line 90
                        echo "                                            <span class=\"g-array-item-author\">
                                                <i class=\"fa fa-user\" aria-hidden=\"true\"></i>";
                        // line 91
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["article"], "author", []), "name", []), "html", null, true);
                        echo "
                                            </span>
                                        ";
                    }
                    // line 94
                    echo "
                                        ";
                    // line 95
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "category", []), "enabled", [])) {
                        // line 96
                        echo "                                            ";
                        $context["category_link"] = ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "category", []), "enabled", []) == "link");
                        // line 97
                        echo "                                            <span class=\"g-array-item-category\">
                                                ";
                        // line 98
                        $context["cat"] = twig_last($this->env, $this->getAttribute($context["article"], "categories", []));
                        // line 99
                        echo "                                                ";
                        if (($context["category_link"] ?? null)) {
                            // line 100
                            echo "                                                    <a href=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "route", []), "html", null, true);
                            echo "\">
                                                        <i class=\"fa fa-folder-open\" aria-hidden=\"true\"></i>";
                            // line 101
                            echo twig_escape_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "title", []), "html", null, true);
                            echo "
                                                    </a>
                                                ";
                        } else {
                            // line 104
                            echo "                                                    <i class=\"fa fa-folder-open\" aria-hidden=\"true\"></i>";
                            echo twig_escape_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "title", []), "html", null, true);
                            echo "
                                                ";
                        }
                        // line 106
                        echo "                                            </span>
                                        ";
                    }
                    // line 108
                    echo "
                                        ";
                    // line 109
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "hits", []), "enabled", [])) {
                        // line 110
                        echo "                                            <span class=\"g-array-item-hits\">
                                                <i class=\"fa fa-eye\" aria-hidden=\"true\"></i>";
                        // line 111
                        echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "hits", []), "html", null, true);
                        echo "
                                            </span>
                                        ";
                    }
                    // line 114
                    echo "                                    </div>
                                ";
                }
                // line 116
                echo "
                                ";
                // line 117
                if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "type", [])) {
                    // line 118
                    echo "                                    ";
                    $context["article_text"] = ((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "type", []) == "intro")) ? ((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "prepare", [])) ? ($this->getAttribute($context["article"], "preparedIntroText", [])) : ($this->getAttribute($context["article"], "introtext", [])))) : ((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "prepare", [])) ? ($this->getAttribute($context["article"], "preparedText", [])) : ($this->getAttribute($context["article"], "text", [])))));
                    // line 119
                    echo "                                    <div class=\"g-array-item-text\">
                                        ";
                    // line 120
                    if (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "formatting", []) == "text")) {
                        // line 121
                        echo "                                            ";
                        echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateText(($context["article_text"] ?? null), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "limit", []));
                        echo "
                                        ";
                    } else {
                        // line 123
                        echo "                                            ";
                        echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateHtml(($context["article_text"] ?? null), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "limit", []));
                        echo "
                                        ";
                    }
                    // line 125
                    echo "                                    </div>
                                ";
                }
                // line 127
                echo "
                                ";
                // line 128
                if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", []), "enabled", [])) {
                    // line 129
                    echo "                                    <div class=\"g-array-item-read-more\">
                                        <a href=\"";
                    // line 130
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "route", []), "html", null, true);
                    echo "\">
                                            <button class=\"button";
                    // line 131
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", []), "css", [])) {
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", []), "css", []), "html", null, true);
                    }
                    echo "\">";
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", [], "any", false, true), "label", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", [], "any", false, true), "label", []), "Read More...")) : ("Read More...")), "html", null, true);
                    echo "</button>

                                        </a>
                                    </div>
                                ";
                }
                // line 136
                echo "                            </div>
                        </div>
                    </div>

                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 141
            echo "            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 143
        echo "
        ";
        // line 144
        if (((($context["total"] ?? null) > $this->getAttribute(($context["limit"] ?? null), "total", [])) && $this->getAttribute(($context["display"] ?? null), "pagination_buttons", []))) {
            // line 145
            echo "            <div class=\"g-content-array-pagination\">
                <button class=\"button float-left contentarray-button pagination-button pagination-button-prev\" data-id=\"";
            // line 146
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "\" data-start=\"";
            echo twig_escape_filter($this->env, max(0, (($context["start"] ?? null) - $this->getAttribute(($context["limit"] ?? null), "total", []))), "html", null, true);
            echo "\"";
            echo ((((($context["start"] ?? null) - $this->getAttribute(($context["limit"] ?? null), "total", [])) < 0)) ? (" disabled") : (""));
            echo ">Prev</button>
                <button class=\"button float-right contentarray-button pagination-button pagination-button-next\" data-id=\"";
            // line 147
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "\" data-start=\"";
            echo twig_escape_filter($this->env, (($context["start"] ?? null) + $this->getAttribute(($context["limit"] ?? null), "total", [])), "html", null, true);
            echo "\"";
            echo ((((($context["start"] ?? null) + $this->getAttribute(($context["limit"] ?? null), "total", [])) >= ($context["total"] ?? null))) ? (" disabled") : (""));
            echo ">Next</button>
                <div class=\"clearfix\"></div>
            </div>
        ";
        }
        // line 151
        echo "    </div>
";
    }

    // line 154
    public function block_javascript_footer($context, array $blocks = [])
    {
        // line 155
        if (((($context["total"] ?? null) > $this->getAttribute(($context["limit"] ?? null), "total", [])) && $this->getAttribute(($context["display"] ?? null), "pagination_buttons", []))) {
            // line 156
            $this->getAttribute(($context["gantry"] ?? null), "load", [0 => "jquery"], "method");
            // line 157
            echo "<script>
    (function (\$) {
        \$(document).on('click', 'button.contentarray-button', function () {
            var id = \$(this).attr('data-id'),
                start = \$(this).attr('data-start'),
                request = {
                'option' : 'com_ajax',
                'plugin' : 'particle',
                'Itemid' : ";
            // line 165
            echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->intFilter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "page", []), "itemid", []));
            echo ",
                'id'     : id,
                'start'  : start,
                'format' : 'json'
            };
            \$.ajax({
                type       : 'GET',
                data       : request,
                indexValue : id + '-particle',
                success: function (response) {
                    if(response.data){
                        \$('#' + this.indexValue).html(response.data[0].html);
                    } else {
                        // TODO: Improve error handling -- instead of replacing particle content, display flash message or something...
                        \$('#' + this.indexValue).html(response.message);
                    }
                },
                error: function(response) {
                    // TODO: Improve error handling -- instead of replacing particle content, display flash message or something...
                    \$('#' + this.indexValue).html('AJAX FAILED ON ERROR');
                }
            });
            return false;
        });
    })(jQuery)
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "@particles/contentarray.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  413 => 165,  403 => 157,  401 => 156,  399 => 155,  396 => 154,  391 => 151,  380 => 147,  372 => 146,  369 => 145,  367 => 144,  364 => 143,  357 => 141,  347 => 136,  334 => 131,  330 => 130,  327 => 129,  325 => 128,  322 => 127,  318 => 125,  312 => 123,  306 => 121,  304 => 120,  301 => 119,  298 => 118,  296 => 117,  293 => 116,  289 => 114,  283 => 111,  280 => 110,  278 => 109,  275 => 108,  271 => 106,  265 => 104,  259 => 101,  254 => 100,  251 => 99,  249 => 98,  246 => 97,  243 => 96,  241 => 95,  238 => 94,  232 => 91,  229 => 90,  227 => 89,  224 => 88,  220 => 86,  214 => 84,  208 => 82,  206 => 81,  201 => 80,  199 => 79,  196 => 78,  194 => 77,  191 => 76,  189 => 75,  186 => 74,  178 => 69,  174 => 68,  170 => 66,  168 => 65,  165 => 64,  162 => 63,  151 => 59,  147 => 58,  144 => 57,  142 => 56,  132 => 53,  128 => 52,  125 => 51,  122 => 50,  119 => 49,  111 => 47,  109 => 46,  103 => 42,  99 => 41,  96 => 40,  92 => 39,  81 => 37,  78 => 35,  75 => 34,  71 => 1,  69 => 32,  67 => 31,  65 => 30,  63 => 29,  60 => 26,  58 => 25,  56 => 24,  54 => 23,  52 => 22,  49 => 19,  46 => 17,  44 => 16,  42 => 15,  40 => 12,  38 => 11,  36 => 8,  34 => 7,  32 => 6,  30 => 5,  28 => 4,  26 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/contentarray.html.twig", "/home/guitars1/dev-test.gslib.ru/public_html/media/gantry5/engines/nucleus/particles/contentarray.html.twig");
    }
}
