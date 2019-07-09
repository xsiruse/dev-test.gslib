<?php

/* @particles/content-pro-joomla.html.twig */
class __TwigTemplate_2de155df9ac6f6015da4bbe210c56e59a269f3d7caf95f521955413cbea61fd6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/content-pro-joomla.html.twig", 1);
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
        // line 3
        $context["attr_extra"] = "";
        // line 4
        if ($this->getAttribute(($context["particle"] ?? null), "extra", [])) {
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["particle"] ?? null), "extra", []));
            foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
                // line 6
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["attributes"]);
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 7
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
        // line 12
        $context["article_settings"] = $this->getAttribute(($context["particle"] ?? null), "article", []);
        // line 13
        $context["filter"] = $this->getAttribute(($context["article_settings"] ?? null), "filter", []);
        // line 14
        $context["sort"] = $this->getAttribute(($context["article_settings"] ?? null), "sort", []);
        // line 15
        $context["limit"] = $this->getAttribute(($context["article_settings"] ?? null), "limit", []);
        // line 16
        $context["display"] = $this->getAttribute(($context["article_settings"] ?? null), "display", []);
        // line 19
        $context["category_options"] = (($this->getAttribute(($context["filter"] ?? null), "categories", [])) ? (["id" => [0 => twig_split_filter($this->env, $this->getAttribute(($context["filter"] ?? null), "categories", []), ","), 1 => 0]]) : ([]));
        // line 20
        $context["categories"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["joomla"] ?? null), "finder", [0 => "category", 1 => ($context["category_options"] ?? null)], "method"), "published", [0 => 1], "method"), "language", [], "method"), "limit", [0 => 0], "method"), "find", [], "method");
        // line 23
        if ($this->getAttribute(($context["filter"] ?? null), "articles", [])) {
            // line 24
            $context["article_options"] = (($this->getAttribute(($context["filter"] ?? null), "articles", [])) ? (["id" => [0 => twig_split_filter($this->env, twig_replace_filter($this->getAttribute(($context["filter"] ?? null), "articles", []), " ", ""), ",")]]) : ([]));
            // line 25
            $context["article_finder"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["joomla"] ?? null), "finder", [0 => "content", 1 => ($context["article_options"] ?? null)], "method"), "published", [0 => 1], "method"), "language", [], "method");
        } else {
            // line 27
            $context["article_finder"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["joomla"] ?? null), "finder", [0 => "content"], "method"), "category", [0 => ($context["categories"] ?? null)], "method"), "published", [0 => 1], "method"), "language", [], "method");
        }
        // line 30
        $context["featured"] = (($this->getAttribute(($context["filter"] ?? null), "featured", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["filter"] ?? null), "featured", []), "include")) : ("include"));
        // line 31
        if ((($context["featured"] ?? null) == "exclude")) {
            // line 32
            $this->getAttribute(($context["article_finder"] ?? null), "featured", [0 => false], "method");
        } elseif ((        // line 33
($context["featured"] ?? null) == "only")) {
            // line 34
            $this->getAttribute(($context["article_finder"] ?? null), "featured", [0 => true], "method");
        }
        // line 37
        $context["articles"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["article_finder"] ?? null), "order", [0 => $this->getAttribute(($context["sort"] ?? null), "orderby", []), 1 => $this->getAttribute(($context["sort"] ?? null), "ordering", [])], "method"), "limit", [0 => $this->getAttribute(($context["limit"] ?? null), "total", [])], "method"), "start", [0 => $this->getAttribute(($context["limit"] ?? null), "start", [])], "method"), "find", [], "method");
        // line 39
        ob_start();
        // line 40
        echo "\t<div class=\"g-particle-intro\">
\t\t";
        // line 41
        if ($this->getAttribute(($context["particle"] ?? null), "mainheading", [])) {
            // line 42
            echo "\t\t\t<h3 class=\"g-title g-main-title\">";
            echo $this->getAttribute(($context["particle"] ?? null), "mainheading", []);
            echo "</h3>
\t\t\t<div class=\"g-title-separator ";
            // line 43
            if (($this->getAttribute(($context["particle"] ?? null), "introtext", []) == false)) {
                echo "no-intro-text";
            }
            echo "\"></div>
\t\t";
        }
        // line 44
        echo "\t
\t\t";
        // line 45
        if ($this->getAttribute(($context["particle"] ?? null), "introtext", [])) {
            echo "<p class=\"g-introtext\">";
            echo $this->getAttribute(($context["particle"] ?? null), "introtext", []);
            echo "</p>";
        }
        // line 46
        echo "\t</div>
";
        $context["particleheading"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 49
        ob_start();
        // line 50
        echo "\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_array_batch(($context["articles"] ?? null), twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "columns", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "columns", []), "3")) : ("3")))));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 51
            echo "\t\t";
            if (((($this->getAttribute(($context["particle"] ?? null), "behaviour", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "behaviour", []), "static")) : ("static")) == "static")) {
                echo "<div class=\"g-grid\">";
            }
            // line 52
            echo "\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["row"]);
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 53
                echo "
\t\t\t\t";
                // line 54
                $context["cat"] = twig_last($this->env, $this->getAttribute($context["article"], "categories", []));
                // line 55
                echo "
\t\t\t\t";
                // line 56
                ob_start();
                // line 57
                echo "\t\t\t\t\t";
                if ($this->getAttribute(($context["particle"] ?? null), "height", [])) {
                    // line 58
                    echo "\t\t\t\t\t\t";
                    ob_start();
                    // line 59
                    if (($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", []) && ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) == "intro"))) {
                        // line 60
                        echo "background-image: url(";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", [])), "html", null, true);
                        echo ")";
                    } elseif (($this->getAttribute($this->getAttribute(                    // line 61
$context["article"], "images", []), "image_fulltext", []) && ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) == "full"))) {
                        // line 62
                        echo "background-image: url(";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_fulltext", [])), "html", null, true);
                        echo ")";
                    }
                    $context["articleimage"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 66
                    ob_start();
                    // line 67
                    echo "height: ";
                    echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "height", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "height", []), "")) : ("")));
                    echo "px";
                    $context["imageheight"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                }
                // line 70
                echo "
\t\t\t\t\t";
                // line 71
                if (($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", []) && (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) == "intro") || ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) == "show")))) {
                    // line 72
                    echo "
\t\t\t\t\t\t<div class=\"g-content-pro-image\"";
                    // line 73
                    if ($this->getAttribute(($context["particle"] ?? null), "height", [])) {
                        echo " style=\"";
                        echo twig_escape_filter($this->env, ($context["articleimage"] ?? null), "html", null, true);
                        echo "; ";
                        echo twig_escape_filter($this->env, ($context["imageheight"] ?? null), "html", null, true);
                        echo ";\"";
                    }
                    echo ">
\t\t\t\t\t\t\t";
                    // line 74
                    if ((((($this->getAttribute(($context["particle"] ?? null), "lightbox", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "lightbox", []), "enable")) : ("enable")) == "enable") || ((($this->getAttribute(($context["particle"] ?? null), "lightbox", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "lightbox", []), "enable")) : ("enable")) == "disable"))) {
                        // line 75
                        echo "\t\t\t\t\t\t\t\t";
                        if (((($this->getAttribute(($context["particle"] ?? null), "lightbox", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "lightbox", []), "enable")) : ("enable")) == "enable")) {
                            // line 76
                            echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", []), false, 0), "html", null, true);
                            echo "\" data-uk-lightbox class=\"uk-overlay uk-overlay-hover\">
\t\t\t\t\t\t\t\t\t";
                            // line 77
                            if (((($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")) == "style1")) {
                                // line 78
                                echo "\t\t\t\t\t\t\t\t\t\t<span class=\"uk-overlay-panel uk-overlay-background uk-overlay-icon uk-overlay-fade\"></span>
\t\t\t\t\t\t\t\t\t";
                            }
                            // line 80
                            echo "\t\t\t\t\t\t\t\t";
                        }
                        // line 81
                        echo "\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute(($context["particle"] ?? null), "height", []) == 0)) {
                            // line 82
                            echo "\t\t\t\t\t\t\t\t\t<img src=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", [])), "html", null, true);
                            echo "\" ";
                            echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->imageSize($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", []));
                            echo " alt=\"";
                            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", [])) ? ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateText($this->getAttribute($context["article"], "title", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", []))) : ($this->getAttribute($context["article"], "title", []))), "html", null, true);
                            echo "\" />
\t\t\t\t\t\t\t\t";
                        }
                        // line 84
                        echo "\t\t\t\t\t\t\t\t";
                        if (((($this->getAttribute(($context["particle"] ?? null), "lightbox", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "lightbox", []), "enable")) : ("enable")) == "enable")) {
                            // line 85
                            echo "\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t";
                        }
                        // line 87
                        echo "\t\t\t\t\t\t\t";
                    }
                    // line 88
                    echo "
\t\t\t\t\t\t\t";
                    // line 89
                    if (((($this->getAttribute(($context["particle"] ?? null), "lightbox", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "lightbox", []), "enable")) : ("enable")) == "disablelink")) {
                        // line 90
                        echo "\t\t\t\t\t\t\t\t<a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "route", []), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t";
                        // line 91
                        if (($this->getAttribute(($context["particle"] ?? null), "height", []) == 0)) {
                            // line 92
                            echo "\t\t\t\t\t\t\t\t\t\t<img src=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", [])), "html", null, true);
                            echo "\" ";
                            echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->imageSize($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", []));
                            echo " alt=\"";
                            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", [])) ? ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateText($this->getAttribute($context["article"], "title", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", []))) : ($this->getAttribute($context["article"], "title", []))), "html", null, true);
                            echo "\" />
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 93
                        echo "\t
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t";
                    }
                    // line 96
                    echo "\t\t\t\t\t\t</div>

\t\t\t\t\t";
                } elseif (($this->getAttribute($this->getAttribute(                // line 98
$context["article"], "images", []), "image_fulltext", []) && ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) == "full"))) {
                    // line 99
                    echo "
\t\t\t\t\t\t<div class=\"g-content-pro-image\"";
                    // line 100
                    if ($this->getAttribute(($context["particle"] ?? null), "height", [])) {
                        echo " style=\"";
                        echo twig_escape_filter($this->env, ($context["articleimage"] ?? null), "html", null, true);
                        echo "; ";
                        echo twig_escape_filter($this->env, ($context["imageheight"] ?? null), "html", null, true);
                        echo ";\"";
                    }
                    echo ">
\t\t\t\t\t\t\t";
                    // line 101
                    if ((((($this->getAttribute(($context["particle"] ?? null), "lightbox", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "lightbox", []), "enable")) : ("enable")) == "enable") || ((($this->getAttribute(($context["particle"] ?? null), "lightbox", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "lightbox", []), "enable")) : ("enable")) == "disable"))) {
                        // line 102
                        echo "\t\t\t\t\t\t\t\t";
                        if (((($this->getAttribute(($context["particle"] ?? null), "lightbox", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "lightbox", []), "enable")) : ("enable")) == "enable")) {
                            // line 103
                            echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_fulltext", []), false, 0), "html", null, true);
                            echo "\" data-uk-lightbox class=\"uk-overlay uk-overlay-hover\">
\t\t\t\t\t\t\t\t\t";
                            // line 104
                            if (((($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")) == "style1")) {
                                // line 105
                                echo "\t\t\t\t\t\t\t\t\t\t<span class=\"uk-overlay-panel uk-overlay-background uk-overlay-icon uk-overlay-fade\"></span>
\t\t\t\t\t\t\t\t\t";
                            }
                            // line 107
                            echo "\t\t\t\t\t\t\t\t";
                        }
                        // line 108
                        echo "\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute(($context["particle"] ?? null), "height", []) == 0)) {
                            // line 109
                            echo "\t\t\t\t\t\t\t\t\t<img src=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_fulltext", [])), "html", null, true);
                            echo "\" ";
                            echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->imageSize($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_fulltext", []));
                            echo " alt=\"";
                            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", [])) ? ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateText($this->getAttribute($context["article"], "title", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", []))) : ($this->getAttribute($context["article"], "title", []))), "html", null, true);
                            echo "\" />
\t\t\t\t\t\t\t\t";
                        }
                        // line 111
                        echo "\t\t\t\t\t\t\t\t";
                        if (((($this->getAttribute(($context["particle"] ?? null), "lightbox", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "lightbox", []), "enable")) : ("enable")) == "enable")) {
                            // line 112
                            echo "\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t";
                        }
                        // line 114
                        echo "\t\t\t\t\t\t\t";
                    }
                    // line 115
                    echo "
\t\t\t\t\t\t\t";
                    // line 116
                    if (((($this->getAttribute(($context["particle"] ?? null), "lightbox", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "lightbox", []), "enable")) : ("enable")) == "disablelink")) {
                        // line 117
                        echo "\t\t\t\t\t\t\t\t<a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "route", []), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t";
                        // line 118
                        if (($this->getAttribute(($context["particle"] ?? null), "height", []) == 0)) {
                            // line 119
                            echo "\t\t\t\t\t\t\t\t\t\t<img src=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", [])), "html", null, true);
                            echo "\" ";
                            echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->imageSize($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", []));
                            echo " alt=\"";
                            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", [])) ? ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateText($this->getAttribute($context["article"], "title", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", []))) : ($this->getAttribute($context["article"], "title", []))), "html", null, true);
                            echo "\" />
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 121
                        echo "\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t";
                    }
                    // line 123
                    echo "\t\t\t\t\t\t</div>

\t\t\t\t\t";
                }
                // line 126
                echo "\t\t\t\t";
                $context["image"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 127
                echo "
\t\t\t\t";
                // line 128
                ob_start();
                // line 129
                echo "\t\t\t\t\t<h4 class=\"g-content-pro-title\">";
                // line 130
                if (((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", [], "any", false, true), "enabled", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", [], "any", false, true), "enabled", []), "show")) : ("show")) == "show")) {
                    // line 131
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "route", []), "html", null, true);
                    echo "\">";
                    // line 132
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", [])) ? ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateText($this->getAttribute($context["article"], "title", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", []))) : ($this->getAttribute($context["article"], "title", []))), "html", null, true);
                    // line 133
                    echo "</a>";
                } else {
                    // line 135
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", [])) ? ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateText($this->getAttribute($context["article"], "title", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "limit", []))) : ($this->getAttribute($context["article"], "title", []))), "html", null, true);
                }
                // line 137
                echo "</h4>
\t\t\t\t";
                $context["articletitle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 138
                echo "\t

\t\t\t\t";
                // line 140
                ob_start();
                // line 141
                echo "\t\t\t\t\t<div class=\"g-article-details details-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "articledetails", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t";
                // line 142
                if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "enabled", [])) {
                    // line 143
                    echo "\t\t\t\t\t\t\t<span class=\"g-article-date\">";
                    // line 144
                    if (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "enabled", []) == "published")) {
                        // line 145
                        echo "<i class=\"fa fa-clock-o\"></i>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('date')->getCallable(), [$this->env, $this->getAttribute($context["article"], "publish_up", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "format", [])]), "html", null, true);
                    } elseif (($this->getAttribute($this->getAttribute(                    // line 146
($context["display"] ?? null), "date", []), "enabled", []) == "modified")) {
                        // line 147
                        echo "<i class=\"fa fa-clock-o\"></i>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('date')->getCallable(), [$this->env, $this->getAttribute($context["article"], "modified", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "format", [])]), "html", null, true);
                    } else {
                        // line 149
                        echo "<i class=\"fa fa-clock-o\"></i>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('date')->getCallable(), [$this->env, $this->getAttribute($context["article"], "created", []), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "date", []), "format", [])]), "html", null, true);
                    }
                    // line 151
                    echo "</span>
\t\t\t\t\t\t";
                }
                // line 153
                echo "
\t\t\t\t\t\t";
                // line 154
                if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "author", []), "enabled", [])) {
                    // line 155
                    echo "\t\t\t\t\t\t\t<span class=\"g-article-author\">";
                    // line 156
                    if (((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "author", [], "any", false, true), "enabled", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["display"] ?? null), "author", [], "any", false, true), "enabled", []), "show")) : ("show")) == "show")) {
                        // line 157
                        echo "<i class=\"fa fa-user\"></i>";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["article"], "author", []), "name", []), "html", null, true);
                    } else {
                        // line 159
                        if ($this->getAttribute($context["article"], "created_by_alias", [])) {
                            // line 160
                            echo "\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-user\"></i>";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "created_by_alias", []), "html", null, true);
                        } else {
                            // line 162
                            echo "<i class=\"fa fa-user\"></i>";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["article"], "author", []), "name", []), "html", null, true);
                        }
                    }
                    // line 165
                    echo "</span>
\t\t\t\t\t\t";
                }
                // line 167
                echo "
\t\t\t\t\t\t";
                // line 168
                if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "category", []), "enabled", [])) {
                    // line 169
                    echo "\t\t\t\t\t\t\t";
                    $context["category_link"] = ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "category", []), "enabled", []) == "link");
                    // line 170
                    echo "\t\t\t\t\t\t\t<span class=\"g-article-category\">
\t\t\t\t\t\t\t\t";
                    // line 171
                    if (($context["category_link"] ?? null)) {
                        // line 172
                        echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "route", []), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-folder-open\"></i>";
                        // line 173
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "title", []), "html", null, true);
                        // line 174
                        echo "</a>
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 176
                        echo "\t\t\t\t\t\t\t\t\t<i class=\"fa fa-folder-open\"></i>";
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "title", []), "html", null, true);
                    }
                    // line 178
                    echo "\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t";
                }
                // line 180
                echo "
\t\t\t\t\t\t";
                // line 181
                if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "hits", []), "enabled", [])) {
                    // line 182
                    echo "\t\t\t\t\t\t\t<span class=\"g-article-hits\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-eye\"></i>";
                    // line 183
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "hits", []), "html", null, true);
                    // line 184
                    echo "</span>
\t\t\t\t\t\t";
                }
                // line 186
                echo "\t\t\t\t\t</div>
\t\t\t\t";
                $context["articledetails"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 188
                echo "
\t\t\t\t";
                // line 189
                ob_start();
                // line 190
                echo "\t\t\t\t\t";
                $context["article_text"] = ((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "type", []) == "intro")) ? ($this->getAttribute($context["article"], "introtext", [])) : ($this->getAttribute($context["article"], "text", [])));
                // line 191
                echo "\t\t\t\t\t<div class=\"g-content-pro-desc\">";
                // line 192
                if (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "formatting", []) == "text")) {
                    // line 193
                    echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateText(($context["article_text"] ?? null), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "limit", []));
                } else {
                    // line 195
                    echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->htmlFilter($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateHtml($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "filter", [0 => ($context["article_text"] ?? null)], "method"), $this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "limit", [])));
                }
                // line 197
                echo "</div>
\t\t\t\t";
                $context["articletext"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 199
                echo "
\t\t\t\t";
                // line 200
                ob_start();
                // line 201
                echo "\t\t\t\t\t<div class=\"g-article-read-more\">
\t\t\t\t\t\t<a class=\"button\" href=\"";
                // line 202
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "route", []), "html", null, true);
                echo "\">";
                // line 203
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", [], "any", false, true), "label", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", [], "any", false, true), "label", []), "Read More...")) : ("Read More...")), "html", null, true);
                // line 204
                echo "</a>
\t\t\t\t\t</div>
\t\t\t\t";
                $context["readmorebutton"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 207
                echo "
\t\t\t\t";
                // line 208
                ob_start();
                // line 209
                echo "\t\t\t\t\t<div class=\"g-content-pro-item g-cat-";
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "alias", [])), "html", null, true);
                if (($this->getAttribute($context["article"], "featured", []) == 1)) {
                    echo " g-featured-article";
                }
                echo "\">
\t\t\t\t\t\t";
                // line 210
                if (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) && ($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", []) || $this->getAttribute($this->getAttribute($context["article"], "images", []), "image_fulltext", [])))) {
                    // line 211
                    echo "\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, ($context["image"] ?? null), "html", null, true);
                    echo "
\t\t\t\t\t\t";
                }
                // line 213
                echo "
\t\t\t\t\t\t";
                // line 214
                if (((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "enabled", []) || ((($this->getAttribute(($context["particle"] ?? null), "articledetails", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "articledetails", []), "show")) : ("show")) != "hide")) || $this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "type", [])) || $this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", []), "enabled", []))) {
                    // line 215
                    echo "\t\t\t\t\t\t\t<div class=\"g-info-container\">
\t\t\t\t\t\t\t\t";
                    // line 216
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "enabled", [])) {
                        // line 217
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["articletitle"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 219
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 220
                    if (((($this->getAttribute(($context["particle"] ?? null), "articledetails", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "articledetails", []), "show")) : ("show")) == "show")) {
                        // line 221
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["articledetails"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 223
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 224
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "type", [])) {
                        // line 225
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["articletext"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 227
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 228
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", []), "enabled", [])) {
                        // line 229
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["readmorebutton"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 231
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 232
                    if (((($this->getAttribute(($context["particle"] ?? null), "articledetails", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "articledetails", []), "show")) : ("show")) == "showbottom")) {
                        // line 233
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["articledetails"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 235
                    echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 237
                echo "\t\t\t\t\t</div>
\t\t\t\t";
                $context["style1"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 239
                echo "
\t\t\t\t";
                // line 240
                ob_start();
                // line 241
                echo "\t\t\t\t\t<div class=\"g-content-pro-item uk-overlay uk-overlay-hover g-cat-";
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "alias", [])), "html", null, true);
                if (($this->getAttribute($context["article"], "featured", []) == 1)) {
                    echo " g-featured-article";
                }
                echo "\">
\t\t\t\t\t\t";
                // line 242
                if (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) && ($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", []) || $this->getAttribute($this->getAttribute($context["article"], "images", []), "image_fulltext", [])))) {
                    // line 243
                    echo "\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, ($context["image"] ?? null), "html", null, true);
                    echo "
\t\t\t\t\t\t";
                }
                // line 245
                echo "
\t\t\t\t\t\t";
                // line 246
                if (((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "enabled", []) || ((($this->getAttribute(($context["particle"] ?? null), "articledetails", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "articledetails", []), "show")) : ("show")) != "hide")) || $this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "type", [])) || $this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", []), "enabled", []))) {
                    // line 247
                    echo "\t\t\t\t\t\t\t<div class=\"g-info-container-style2 uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-overlay-slide-bottom\">
\t\t\t\t\t\t\t\t";
                    // line 248
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "enabled", [])) {
                        // line 249
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["articletitle"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 251
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 252
                    if (((($this->getAttribute(($context["particle"] ?? null), "articledetails", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "articledetails", []), "show")) : ("show")) == "show")) {
                        // line 253
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["articledetails"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 255
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 256
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "type", [])) {
                        // line 257
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["articletext"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 259
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 260
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", []), "enabled", [])) {
                        // line 261
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["readmorebutton"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 263
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 264
                    if (((($this->getAttribute(($context["particle"] ?? null), "articledetails", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "articledetails", []), "show")) : ("show")) == "showbottom")) {
                        // line 265
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["articledetails"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 267
                    echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 269
                echo "\t\t\t\t\t</div>
\t\t\t\t";
                $context["style2"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 271
                echo "
\t\t\t\t";
                // line 272
                ob_start();
                // line 273
                echo "\t\t\t\t\t<div class=\"g-content-pro-item uk-overlay g-cat-";
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute(($context["cat"] ?? null), "alias", [])), "html", null, true);
                if (($this->getAttribute($context["article"], "featured", []) == 1)) {
                    echo " g-featured-article";
                }
                echo "\">
\t\t\t\t\t\t";
                // line 274
                if (($this->getAttribute($this->getAttribute(($context["display"] ?? null), "image", []), "enabled", []) && ($this->getAttribute($this->getAttribute($context["article"], "images", []), "image_intro", []) || $this->getAttribute($this->getAttribute($context["article"], "images", []), "image_fulltext", [])))) {
                    // line 275
                    echo "\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, ($context["image"] ?? null), "html", null, true);
                    echo "
\t\t\t\t\t\t";
                }
                // line 277
                echo "
\t\t\t\t\t\t";
                // line 278
                if (((($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "enabled", []) || ((($this->getAttribute(($context["particle"] ?? null), "articledetails", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "articledetails", []), "show")) : ("show")) != "hide")) || $this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "type", [])) || $this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", []), "enabled", []))) {
                    // line 279
                    echo "\t\t\t\t\t\t\t<div class=\"g-info-container-style2 uk-overlay-panel uk-overlay-background uk-overlay-bottom\">
\t\t\t\t\t\t\t\t";
                    // line 280
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "title", []), "enabled", [])) {
                        // line 281
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["articletitle"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 283
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 284
                    if (((($this->getAttribute(($context["particle"] ?? null), "articledetails", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "articledetails", []), "show")) : ("show")) == "show")) {
                        // line 285
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["articledetails"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 287
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 288
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "text", []), "type", [])) {
                        // line 289
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["articletext"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 291
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 292
                    if ($this->getAttribute($this->getAttribute(($context["display"] ?? null), "read_more", []), "enabled", [])) {
                        // line 293
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["readmorebutton"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 295
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 296
                    if (((($this->getAttribute(($context["particle"] ?? null), "articledetails", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "articledetails", []), "show")) : ("show")) == "showbottom")) {
                        // line 297
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, ($context["articledetails"] ?? null), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 299
                    echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 301
                echo "\t\t\t\t\t</div>
\t\t\t\t";
                $context["style3"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 303
                echo "
\t\t\t\t";
                // line 304
                if (((($this->getAttribute(($context["particle"] ?? null), "behaviour", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "behaviour", []), "static")) : ("static")) == "static")) {
                    // line 305
                    echo "\t\t\t\t\t<div class=\"g-block\">
\t\t\t\t\t\t<div ";
                    // line 306
                    if (((($this->getAttribute(($context["particle"] ?? null), "gutter", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "gutter", []), "enabled")) : ("enabled")) == "enabled")) {
                        echo "class=\"g-content\"";
                    }
                    echo ">
\t\t\t\t\t\t\t";
                    // line 307
                    if (((($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")) == "style1")) {
                        echo twig_escape_filter($this->env, ($context["style1"] ?? null), "html", null, true);
                    }
                    // line 308
                    echo "\t\t\t\t\t\t\t";
                    if (((($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")) == "style2")) {
                        echo twig_escape_filter($this->env, ($context["style2"] ?? null), "html", null, true);
                    }
                    // line 309
                    echo "\t\t\t\t\t\t\t";
                    if (((($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")) == "style3")) {
                        echo twig_escape_filter($this->env, ($context["style3"] ?? null), "html", null, true);
                    }
                    // line 310
                    echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
                }
                // line 313
                echo "
\t\t\t\t";
                // line 314
                if ((((($this->getAttribute(($context["particle"] ?? null), "behaviour", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "behaviour", []), "static")) : ("static")) == "slider") || ((($this->getAttribute(($context["particle"] ?? null), "behaviour", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "behaviour", []), "static")) : ("static")) == "slideset"))) {
                    // line 315
                    echo "\t\t\t\t\t<li>
\t\t\t\t\t\t";
                    // line 316
                    if (((($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")) == "style1")) {
                        echo twig_escape_filter($this->env, ($context["style1"] ?? null), "html", null, true);
                    }
                    // line 317
                    echo "\t\t\t\t\t\t";
                    if (((($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")) == "style2")) {
                        echo twig_escape_filter($this->env, ($context["style2"] ?? null), "html", null, true);
                    }
                    // line 318
                    echo "\t\t\t\t\t\t";
                    if (((($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")) == "style3")) {
                        echo twig_escape_filter($this->env, ($context["style3"] ?? null), "html", null, true);
                    }
                    // line 319
                    echo "\t\t\t\t\t</li>
\t\t\t\t";
                }
                // line 321
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 323
            echo "\t\t";
            if (((($this->getAttribute(($context["particle"] ?? null), "behaviour", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "behaviour", []), "static")) : ("static")) == "static")) {
                echo "</div>";
            }
            // line 324
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        $context["contentproitems"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 327
    public function block_particle($context, array $blocks = [])
    {
        // line 328
        echo "\t
\t";
        // line 329
        if (((($this->getAttribute(($context["particle"] ?? null), "behaviour", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "behaviour", []), "static")) : ("static")) == "static")) {
            // line 330
            echo "\t\t<div class=\"g-content-pro ";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")));
            if ($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "css", []), "class", [])) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["particle"] ?? null), "css", []), "class", []));
            }
            if ((($this->getAttribute(($context["particle"] ?? null), "pullup", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "pullup", []), 0)) : (0))) {
                echo " g-pullup";
            }
            if (((($this->getAttribute(($context["particle"] ?? null), "gutter", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "gutter", []), "enabled")) : ("enabled")) == "enabled")) {
                echo " gutter-enabled";
            } else {
                echo " gutter-disabled";
            }
            echo "\" ";
            if ($this->getAttribute(($context["particle"] ?? null), "extra", [])) {
                echo ($context["attr_extra"] ?? null);
            }
            echo ">
\t\t\t";
            // line 331
            if (($this->getAttribute(($context["particle"] ?? null), "mainheading", []) || $this->getAttribute(($context["particle"] ?? null), "introtext", []))) {
                // line 332
                echo "\t\t\t\t";
                echo twig_escape_filter($this->env, ($context["particleheading"] ?? null), "html", null, true);
                echo "
\t\t\t";
            }
            // line 334
            echo "\t\t\t";
            echo twig_escape_filter($this->env, ($context["contentproitems"] ?? null), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 337
        echo "\t";
        if (((($this->getAttribute(($context["particle"] ?? null), "behaviour", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "behaviour", []), "static")) : ("static")) == "slider")) {
            // line 338
            echo "\t\t<div class=\"g-content-pro-slider ";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")));
            if ($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "css", []), "class", [])) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["particle"] ?? null), "css", []), "class", []));
            }
            if ((($this->getAttribute(($context["particle"] ?? null), "pullup", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "pullup", []), 0)) : (0))) {
                echo " g-pullup";
            }
            if (((($this->getAttribute(($context["particle"] ?? null), "gutter", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "gutter", []), "enabled")) : ("enabled")) == "enabled")) {
                echo " gutter-enabled";
            } else {
                echo " gutter-disabled";
            }
            echo "\" ";
            if ($this->getAttribute(($context["particle"] ?? null), "extra", [])) {
                echo ($context["attr_extra"] ?? null);
            }
            echo ">
\t\t\t";
            // line 339
            if (($this->getAttribute(($context["particle"] ?? null), "mainheading", []) || $this->getAttribute(($context["particle"] ?? null), "introtext", []))) {
                // line 340
                echo "\t\t\t\t";
                echo twig_escape_filter($this->env, ($context["particleheading"] ?? null), "html", null, true);
                echo "
\t\t\t";
            }
            // line 341
            echo "\t\t    \t
\t\t\t<div class=\"uk-slidenav-position\" data-uk-slider";
            // line 342
            if (((($this->getAttribute(($context["particle"] ?? null), "autoplay", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "autoplay", []), "disable")) : ("disable")) == "enable")) {
                echo "=\"{autoplay:true, autoplayInterval: ";
                echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "autoplayInterval", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "autoplayInterval", []), 7000)) : (7000)));
                echo "}\"";
            }
            echo ">
\t\t\t\t<div class=\"uk-slider-container\">
\t\t\t\t\t<ul class=\"uk-slider";
            // line 344
            if (((($this->getAttribute(($context["particle"] ?? null), "gutter", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "gutter", []), "enabled")) : ("enabled")) == "enabled")) {
                echo " uk-grid";
            }
            echo " uk-grid-width-medium-1-";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "columns", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "columns", []), "3")) : ("3")));
            echo "\">
\t\t\t\t\t\t";
            // line 345
            echo twig_escape_filter($this->env, ($context["contentproitems"] ?? null), "html", null, true);
            echo "
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t";
            // line 348
            if ((((($this->getAttribute(($context["particle"] ?? null), "navigation", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "navigation", []), "arrows")) : ("arrows")) == "arrows") || ((($this->getAttribute(($context["particle"] ?? null), "navigation", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "navigation", []), "arrows")) : ("arrows")) == "both"))) {
                // line 349
                echo "\t\t\t\t\t<div class=\"g-particle-navigation\">
\t\t\t\t\t\t<a href=\"\" class=\"uk-slidenav uk-slidenav-previous\" data-uk-slider-item=\"previous\"></a>
\t\t\t\t\t\t<a href=\"\" class=\"uk-slidenav uk-slidenav-next\" data-uk-slider-item=\"next\"></a>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 354
            echo "\t\t\t</div>\t\t    \t
\t\t</div>
\t";
        }
        // line 357
        echo "\t";
        if (((($this->getAttribute(($context["particle"] ?? null), "behaviour", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "behaviour", []), "static")) : ("static")) == "slideset")) {
            // line 358
            echo "\t\t<div class=\"g-content-pro-slideset ";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "style", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "style", []), "style1")) : ("style1")));
            if ($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "css", []), "class", [])) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["particle"] ?? null), "css", []), "class", []));
            }
            if ((($this->getAttribute(($context["particle"] ?? null), "pullup", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "pullup", []), 0)) : (0))) {
                echo " g-pullup";
            }
            if (((($this->getAttribute(($context["particle"] ?? null), "gutter", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "gutter", []), "enabled")) : ("enabled")) == "enabled")) {
                echo " gutter-enabled";
            } else {
                echo " gutter-disabled";
            }
            echo "\" ";
            if ($this->getAttribute(($context["particle"] ?? null), "extra", [])) {
                echo ($context["attr_extra"] ?? null);
            }
            echo ">
\t\t\t";
            // line 359
            if (($this->getAttribute(($context["particle"] ?? null), "mainheading", []) || $this->getAttribute(($context["particle"] ?? null), "introtext", []))) {
                // line 360
                echo "\t\t\t\t";
                echo twig_escape_filter($this->env, ($context["particleheading"] ?? null), "html", null, true);
                echo "
\t\t\t";
            }
            // line 361
            echo "\t    \t
\t\t\t<div class=\"uk-slidenav-position\" data-uk-slideset=\"{small: 1, medium: ";
            // line 362
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "columns", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "columns", []), "3")) : ("3")));
            echo ", large: ";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "columns", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "columns", []), "3")) : ("3")));
            echo ", duration: ";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "duration", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "duration", []), 200)) : (200)));
            echo ", ";
            if (((($this->getAttribute(($context["particle"] ?? null), "autoplay", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "autoplay", []), "disable")) : ("disable")) == "enable")) {
                echo "autoplay: 'true', autoplayInterval: ";
                echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "autoplayInterval", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "autoplayInterval", []), 7000)) : (7000)));
                echo ",";
            }
            echo " animation: '";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "animation", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "animation", []), "fade")) : ("fade")));
            echo "'}\">
\t\t\t\t<div class=\"uk-slider-container\">
\t\t\t\t\t<ul class=\"uk-slideset uk-grid\">
\t\t\t\t\t\t";
            // line 365
            echo twig_escape_filter($this->env, ($context["contentproitems"] ?? null), "html", null, true);
            echo "
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t";
            // line 368
            if ((((($this->getAttribute(($context["particle"] ?? null), "navigation", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "navigation", []), "arrows")) : ("arrows")) == "arrows") || ((($this->getAttribute(($context["particle"] ?? null), "navigation", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "navigation", []), "arrows")) : ("arrows")) == "both"))) {
                // line 369
                echo "\t\t\t\t\t<div class=\"g-particle-navigation\">
\t\t\t\t\t\t<a href=\"\" class=\"uk-slidenav uk-slidenav-previous\" data-uk-slideset-item=\"previous\"></a>
\t\t\t\t\t\t<a href=\"\" class=\"uk-slidenav uk-slidenav-next\" data-uk-slideset-item=\"next\"></a>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 374
            echo "\t\t\t\t";
            if ((((($this->getAttribute(($context["particle"] ?? null), "navigation", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "navigation", []), "arrows")) : ("arrows")) == "dots") || ((($this->getAttribute(($context["particle"] ?? null), "navigation", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "navigation", []), "arrows")) : ("arrows")) == "both"))) {
                // line 375
                echo "\t\t\t\t\t<ul class=\"uk-slideset-nav uk-dotnav uk-flex-center\">
\t    \t\t\t";
                // line 376
                $context["counter"] = 0;
                // line 377
                echo "\t    \t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["articles"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                    // line 378
                    echo "\t    \t\t\t\t<li data-uk-slideset-item=\"";
                    echo twig_escape_filter($this->env, ($context["counter"] ?? null), "html", null, true);
                    echo "\"><a href=\"\"></a></li>
\t    \t\t\t\t";
                    // line 379
                    $context["counter"] = (($context["counter"] ?? null) + 1);
                    // line 380
                    echo "\t    \t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 381
                echo "\t\t\t\t\t</ul>
\t\t\t\t";
            }
            // line 383
            echo "\t\t\t</div>\t\t    \t
\t\t</div>
\t";
        }
    }

    public function getTemplateName()
    {
        return "@particles/content-pro-joomla.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1094 => 383,  1090 => 381,  1084 => 380,  1082 => 379,  1077 => 378,  1072 => 377,  1070 => 376,  1067 => 375,  1064 => 374,  1057 => 369,  1055 => 368,  1049 => 365,  1031 => 362,  1028 => 361,  1022 => 360,  1020 => 359,  999 => 358,  996 => 357,  991 => 354,  984 => 349,  982 => 348,  976 => 345,  968 => 344,  959 => 342,  956 => 341,  950 => 340,  948 => 339,  927 => 338,  924 => 337,  917 => 334,  911 => 332,  909 => 331,  888 => 330,  886 => 329,  883 => 328,  880 => 327,  876 => 1,  869 => 324,  864 => 323,  857 => 321,  853 => 319,  848 => 318,  843 => 317,  839 => 316,  836 => 315,  834 => 314,  831 => 313,  826 => 310,  821 => 309,  816 => 308,  812 => 307,  806 => 306,  803 => 305,  801 => 304,  798 => 303,  794 => 301,  790 => 299,  784 => 297,  782 => 296,  779 => 295,  773 => 293,  771 => 292,  768 => 291,  762 => 289,  760 => 288,  757 => 287,  751 => 285,  749 => 284,  746 => 283,  740 => 281,  738 => 280,  735 => 279,  733 => 278,  730 => 277,  724 => 275,  722 => 274,  714 => 273,  712 => 272,  709 => 271,  705 => 269,  701 => 267,  695 => 265,  693 => 264,  690 => 263,  684 => 261,  682 => 260,  679 => 259,  673 => 257,  671 => 256,  668 => 255,  662 => 253,  660 => 252,  657 => 251,  651 => 249,  649 => 248,  646 => 247,  644 => 246,  641 => 245,  635 => 243,  633 => 242,  625 => 241,  623 => 240,  620 => 239,  616 => 237,  612 => 235,  606 => 233,  604 => 232,  601 => 231,  595 => 229,  593 => 228,  590 => 227,  584 => 225,  582 => 224,  579 => 223,  573 => 221,  571 => 220,  568 => 219,  562 => 217,  560 => 216,  557 => 215,  555 => 214,  552 => 213,  546 => 211,  544 => 210,  536 => 209,  534 => 208,  531 => 207,  526 => 204,  524 => 203,  521 => 202,  518 => 201,  516 => 200,  513 => 199,  509 => 197,  506 => 195,  503 => 193,  501 => 192,  499 => 191,  496 => 190,  494 => 189,  491 => 188,  487 => 186,  483 => 184,  481 => 183,  478 => 182,  476 => 181,  473 => 180,  469 => 178,  465 => 176,  461 => 174,  459 => 173,  454 => 172,  452 => 171,  449 => 170,  446 => 169,  444 => 168,  441 => 167,  437 => 165,  432 => 162,  428 => 160,  426 => 159,  422 => 157,  420 => 156,  418 => 155,  416 => 154,  413 => 153,  409 => 151,  405 => 149,  401 => 147,  399 => 146,  396 => 145,  394 => 144,  392 => 143,  390 => 142,  385 => 141,  383 => 140,  379 => 138,  375 => 137,  372 => 135,  369 => 133,  367 => 132,  363 => 131,  361 => 130,  359 => 129,  357 => 128,  354 => 127,  351 => 126,  346 => 123,  342 => 121,  332 => 119,  330 => 118,  325 => 117,  323 => 116,  320 => 115,  317 => 114,  313 => 112,  310 => 111,  300 => 109,  297 => 108,  294 => 107,  290 => 105,  288 => 104,  283 => 103,  280 => 102,  278 => 101,  268 => 100,  265 => 99,  263 => 98,  259 => 96,  254 => 93,  244 => 92,  242 => 91,  237 => 90,  235 => 89,  232 => 88,  229 => 87,  225 => 85,  222 => 84,  212 => 82,  209 => 81,  206 => 80,  202 => 78,  200 => 77,  195 => 76,  192 => 75,  190 => 74,  180 => 73,  177 => 72,  175 => 71,  172 => 70,  166 => 67,  164 => 66,  158 => 62,  156 => 61,  152 => 60,  150 => 59,  147 => 58,  144 => 57,  142 => 56,  139 => 55,  137 => 54,  134 => 53,  129 => 52,  124 => 51,  119 => 50,  117 => 49,  113 => 46,  107 => 45,  104 => 44,  97 => 43,  92 => 42,  90 => 41,  87 => 40,  85 => 39,  83 => 37,  80 => 34,  78 => 33,  76 => 32,  74 => 31,  72 => 30,  69 => 27,  66 => 25,  64 => 24,  62 => 23,  60 => 20,  58 => 19,  56 => 16,  54 => 15,  52 => 14,  50 => 13,  48 => 12,  37 => 7,  33 => 6,  29 => 5,  27 => 4,  25 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/content-pro-joomla.html.twig", "/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/content-pro-joomla.html.twig");
    }
}
