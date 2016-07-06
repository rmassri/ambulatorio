SELECT 
  municipio.estado_id, 
  estado.id, 
  municipio.id, 
  parroquia.municipio_id, 
  grupo.id, 
  usuario.grupo_id, 
  usuario.id, 
  tipo_enfermedad.usuario_ini_id, 
  tipo_enfermedad.usuario_act_id, 
  tipo_enfermedad.usuario_eli_id, 
  enfermedad.usuario_act_id, 
  enfermedad.usuario_ini_id, 
  enfermedad.usuario_eli_id, 
  medicamento.usuario_ini_id, 
  medicamento.usuario_act_id, 
  medicamento.usuario_eli_id, 
  medico.usuario_ini_id, 
  medico.usuario_act_id, 
  medico.usuario_eli_id, 
  paciente.usuario_ini_id, 
  paciente.usuario_act_id, 
  paciente.usuario_eli_id, 
  medico.estado_id, 
  paciente.estado_id, 
  paciente.municipio_id, 
  medico.municipio_id, 
  parroquia.id, 
  paciente.parroquia_id, 
  inventario_medicamento.id, 
  paciente.id, 
  inventario_medicamento.paciente_id, 
  medico.id, 
  inventario_medicamento.medico_id, 
  medicamento.id, 
  atencion.paciente_id, 
  atencion.medico_id, 
  enfermedad.id
FROM 
  public.estado, 
  public.municipio, 
  public.parroquia, 
  seguridad.usuario, 
  seguridad.grupo, 
  estructura.atencion, 
  estructura.enfermedad, 
  estructura.inventario_medicamento, 
  estructura.medicamento, 
  estructura.medico, 
  estructura.paciente, 
  estructura.tipo_enfermedad
WHERE 
  estado.id = municipio.estado_id AND
  estado.id = medico.estado_id AND
  estado.id = paciente.estado_id AND
  municipio.id = parroquia.municipio_id AND
  municipio.id = paciente.municipio_id AND
  municipio.id = medico.municipio_id AND
  parroquia.id = paciente.parroquia_id AND
  parroquia.id = medico.parroquia_id AND
  usuario.id = tipo_enfermedad.usuario_ini_id AND
  usuario.id = tipo_enfermedad.usuario_act_id AND
  usuario.id = tipo_enfermedad.usuario_eli_id AND
  usuario.id = enfermedad.usuario_ini_id AND
  usuario.id = enfermedad.usuario_act_id AND
  usuario.id = enfermedad.usuario_eli_id AND
  usuario.id = medicamento.usuario_ini_id AND
  usuario.id = medicamento.usuario_act_id AND
  usuario.id = medicamento.usuario_eli_id AND
  usuario.id = medico.usuario_ini_id AND
  usuario.id = medico.usuario_act_id AND
  usuario.id = medico.usuario_eli_id AND
  usuario.id = paciente.usuario_ini_id AND
  usuario.id = paciente.usuario_act_id AND
  usuario.id = paciente.usuario_eli_id AND
  grupo.id = usuario.grupo_id AND
  enfermedad.id = atencion.enfermedad_id AND
  medicamento.id = inventario_medicamento.medicamento_id AND
  medico.id = inventario_medicamento.medico_id AND
  medico.id = atencion.medico_id AND
  paciente.id = inventario_medicamento.paciente_id AND
  paciente.id = atencion.paciente_id;
