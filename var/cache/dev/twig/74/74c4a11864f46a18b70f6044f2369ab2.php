<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* producto/nuevo.html.twig */
class __TwigTemplate_265cbc406b7b81bcb315294f0bd9b233 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "producto/nuevo.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "producto/nuevo.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "producto/nuevo.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Nuevo Producto";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "    <h1>Nuevo Producto</h1>

    <form action=\"";
        // line 8
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("nuevo_producto");
        yield "\" method=\"POST\">
        <div>
            <label for=\"nombre\">Nombre:</label>
            <input type=\"text\" id=\"nombre\" name=\"nombre\" required>
        </div>
        <div>
            <label for=\"precio\">Precio:</label>
            <input type=\"number\" id=\"precio\" name=\"precio\" step=\"0.01\" required>
        </div>
        <div>
            <label for=\"marca\">Marca:</label>
            <input type=\"text\" id=\"marca\" name=\"marca\" required>
        </div>
        <div>
            <label for=\"cantidad\">Cantidad:</label>
            <input type=\"number\" id=\"cantidad\" name=\"cantidad\" required>
        </div>
        <div>
            <label for=\"descripcion\">Descripción:</label>
            <textarea id=\"descripcion\" name=\"descripcion\" required></textarea>
        </div>
        <div>
            <button type=\"submit\">Crear Producto</button>
        </div>
    </form>

    <a href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("listar_productos");
        yield "\">Volver a la lista de productos</a>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "producto/nuevo.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  127 => 34,  98 => 8,  94 => 6,  84 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Nuevo Producto{% endblock %}

{% block body %}
    <h1>Nuevo Producto</h1>

    <form action=\"{{ path('nuevo_producto') }}\" method=\"POST\">
        <div>
            <label for=\"nombre\">Nombre:</label>
            <input type=\"text\" id=\"nombre\" name=\"nombre\" required>
        </div>
        <div>
            <label for=\"precio\">Precio:</label>
            <input type=\"number\" id=\"precio\" name=\"precio\" step=\"0.01\" required>
        </div>
        <div>
            <label for=\"marca\">Marca:</label>
            <input type=\"text\" id=\"marca\" name=\"marca\" required>
        </div>
        <div>
            <label for=\"cantidad\">Cantidad:</label>
            <input type=\"number\" id=\"cantidad\" name=\"cantidad\" required>
        </div>
        <div>
            <label for=\"descripcion\">Descripción:</label>
            <textarea id=\"descripcion\" name=\"descripcion\" required></textarea>
        </div>
        <div>
            <button type=\"submit\">Crear Producto</button>
        </div>
    </form>

    <a href=\"{{ path('listar_productos') }}\">Volver a la lista de productos</a>
{% endblock %}", "producto/nuevo.html.twig", "C:\\Proyecto\\ShoeComerce\\templates\\producto\\nuevo.html.twig");
    }
}
