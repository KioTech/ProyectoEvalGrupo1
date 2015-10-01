<?php
class Project_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function insert_project($tituloProyecto,$imagenProyecto,$descripcionBreveProyecto,$categoriaProyecto,$ubicacionProyecto,$metaProyecto,$descripcionProyecto) {
    $data = array(
      'ID' => '',
      'Nombre_TXT' => $tituloProyecto,
      'Resumen_TXT' => $descripcionBreveProyecto,
      'ImagenProyecto_TXT' => $imagenProyecto,
      'VideoProyecto_TXT' => '',
      'Descripcion_TXT' => $descripcionProyecto,
      'Meta_TXT' => $metaProyecto,
      'Ubicacion_TXT' => $ubicacionProyecto,
      'Categoria_TXT' => $categoriaProyecto
    );

    $this->db->insert('t005_proyectos_ma', $data);
  }
  public function get_categories()
  {
    $query = $this->db->query("Select * from t007_categorias_cat");
    return $query->result_array();
  }
  public function checkIfExist()
  {
    // return $this->db->get_where($tableName, array($field => $value), 1)->num_rows() > 0 ? false : true;
    return $this->db->get_where($_POST['tableName'], array($_POST['field'] => $_POST['value']), 1)->num_rows() > 0 ? false : true;
  }
}
