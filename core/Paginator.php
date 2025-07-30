<?php
namespace Core;

class Paginator
{
    protected $total;
    protected $paginaActual;
    protected $porPagina;
    protected $urlBase;
    protected $query;

    public function __construct($total, $paginaActual, $porPagina, $urlBase, $queryParams = [])
    {
        $this->total = $total;
        $this->paginaActual = $paginaActual;
        $this->porPagina = $porPagina;
        $this->urlBase = $urlBase;
        $this->query = $queryParams;
    }

    public function mostrar()
    {
        $paginasTotales = ceil($this->total / $this->porPagina);
        if ($paginasTotales <= 1) return '';

        $html = '<div class="paginacion">';

        // Anterior
        if ($this->paginaActual > 1) {
            $html .= $this->enlace($this->paginaActual - 1, 'Anterior');
        } else {
            $html .= '<button class="disabled" disabled>Anterior</button>';
        }

        $html .= '<span style="align-self:center;"> Página ' . $this->paginaActual . ' de ' . $paginasTotales . ' </span>';

        // Siguiente
        if ($this->paginaActual < $paginasTotales) {
            $html .= $this->enlace($this->paginaActual + 1, 'Siguiente');
        } else {
            $html .= '<button class="disabled" disabled>Siguiente</button>';
        }

        $html .= '</div>';
        return $html;
    }

    private function enlace($pagina, $texto)
    {
        $this->query['page'] = $pagina;
        $queryStr = http_build_query($this->query);
        $href = $this->urlBase . '?' . $queryStr;
        return '<a href="' . $href . '"><button>' . $texto . '</button></a>';
    }
}
