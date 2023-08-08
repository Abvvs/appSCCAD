<!-- Layout wrapper -->
<!-- Layout container -->

<div class="layout-page">
  <!-- Navbar -->
  <nav
  class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
  id="layout-navbar"
  >
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-user bx-md"></i>
                  <label class="mt-3"><h2>EMPLEADOS</h2></label>
                </div>
              </div>
              <!-- /Search -->
            </div>
          </nav>
          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-fluid flex-grow-1 container-p-y">
              <div class="alert alert-danger" role="alert" id="empEliminado">Empleado Eliminado con Éxito</div>
              <!-- Layout Demo -->
              <div class="layout-demo-wrapper">
                <!-- Form controls -->
                <div class="col-xxl">
                  <div class="card mb-5">
                    <div class="card-body">
                      <form action="<?php echo base_url('nuevoEmpleado'); ?>" method="POST">
                        <div class="row mb-3">
                          <h4>Nuevo Empleado</h4>
                          <label class="col-sm-2 col-form-label" for="nombreEmp">Nombres</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                id="nombreEmp"
                                name="nombreEmp"
                                placeholder="John"
                                aria-label="John"
                                aria-describedby="basic-icon-default-fullname2" required
                              />
                            </div>
                          </div>
                            <label class="col-sm-2 col-form-label mt-2" for="apellidoEmp">Apellidos</label>
                            <div class="col-sm-10 mt-2">
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                                ></span>
                                <input
                                type="text"
                                class="form-control"
                                id="apellidoEmp"
                                name="apellidoEmp"
                                placeholder="Doe"
                                aria-label="Doe"
                                aria-describedby="basic-icon-default-fullname2" required
                                />
                              </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="direccionEmp">Dirección</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                id="direccionEmp"
                                name="direccionEmp"
                                class="form-control"
                                placeholder="Av. Quito y 12 de Febrero"
                                aria-label="ACME Inc."
                                aria-describedby="basic-icon-default-company2" required
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="identificacionEmp"># Identificación</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text">
                              <i class="bx bx-id-card"></i>
                              </span>
                              <input
                                type="text"
                                maxlength="10"
                                size="10"
                                id="identificacionEmp"
                                name="identificacionEmp"
                                class="form-control phone-mask"
                                placeholder="1002003001"
                                aria-label="658 799 8941"
                                aria-describedby="basic-icon-default-phone2"
                                required
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="salarioEmp">Salario (Diario)</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-money"></i>
                              </span>
                              <input
                                type="number"
                                id="salarioEmp"
                                name="salarioEmp"
                                class="form-control phone-mask"
                                placeholder="15"
                                aria-label="658 799 8941"
                                aria-describedby="basic-icon-default-phone2" required
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="rolEmp">Rol</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-briefcase"></i>
                              </span>
                              <select class="form-select" id="rolEmp" aria-label="Default select example" name="rolEmp">
                                <option selected value="0">Seleccione un Rol</option>
                                <?php
                                  for($i = 0; $i < count($roles); $i++){
                                    $r = $roles[$i];
                                    echo'
                                      <option value='.$r['rol_id'].'>'.$r['rol_nombre'].'</option>
                                    ';
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Registrar Empleado</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Layout Demo -->
              
            </div>
            <!-- tabla para empleados-->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="card">
                  <h5 class="card-header">Empleados</h5>
                  <div class="table-responsive text-nowrap">
                    <table class="table">
                      <thead>
                        <tr class="text-nowrap">
                          <th>#</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th># Identificación</th>
                          <th>Dirección</th>
                          <th>$ Salario</th>
                          <th>Rol</th>
                          <th>Acciones</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          </td>
                          <?php
                            for ($i = 0; $i < count($empleados); $i++) {
                                $e = $empleados[$i];    
                                echo '
                                    <tr>
                                        <td name="idEmp">' . $e['emp_id'] . '</td>
                                        <td>' . $e['emp_nombre'] . '</td>
                                        <td>' . $e['emp_apellido'] . '</td>
                                        <td>' . $e['emp_identificacion'] . '</td>
                                        <td>' . $e['emp_direccion'] . '</td>
                                        <td>' . $e['emp_salario'] . '</td>
                                        <td>' . $e['rol_nombre'] . '</td>
                                        <td> 
                                          <div class="dropdown">
                                            <button type="button" name="btnAccion" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" name="mEditar" href="" data-bs-toggle="modal" data-bs-target="#modalCenter" onclick= "llenarModalEditE('.$e['emp_id'].',\''.$e['emp_nombre'].'\',\''.$e['emp_apellido'].'\',\''.$e['emp_direccion'].'\',\''.$e['emp_identificacion'].'\',\''.$e['emp_salario'].'\',\''.$e['rol_nombre'].'\')">
                                                <i class="bx bx-edit-alt me-1"></i> Editar</a>
                                              
                                              <a class="dropdown-item" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTop" onclick="idEmpleado('.$e['emp_id'].')">
                                                <i class="bx bx-trash me-1"></i> Eliminar</a>
                                              
                                            </div>
                                          </div>
                                        </td>
                                    </tr>
                                    ';
                            }
                           ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
             </div>   
              <!-- Modal -->
              <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">Editar Empleado</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                    <form  action="<?php echo base_url('editarEmpleado')?>" method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="mnombreEmp">Nombres</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                id="mnombreEmp"
                                name="mnombreEmp"
                                placeholder="John"
                                aria-label="John"
                                aria-describedby="basic-icon-default-fullname2" required
                              /><input
                                type="text"
                                class="form-control"
                                id="midEmp"
                                name="midEmp"
                                placeholder="ID"
                                aria-label="John"
                                aria-describedby="basic-icon-default-fullname2" hidden 
                              />
                            </div>
                          </div>
                            <label class="col-sm-2 col-form-label mt-2" for="mapellidoEmp">Apellidos</label>
                            <div class="col-sm-10 mt-2">
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                                ></span>
                                <input
                                type="text"
                                class="form-control"
                                id="mapellidoEmp"
                                name="mapellidoEmp"
                                placeholder="Doe"
                                aria-label="Doe"
                                aria-describedby="basic-icon-default-fullname2" required
                                />
                              </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="mdireccionEmp">Dirección</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                id="mdireccionEmp"
                                name="mdireccionEmp"
                                class="form-control"
                                placeholder="Av. Quito y 12 de Febrero"
                                aria-label="ACME Inc."
                                aria-describedby="basic-icon-default-company2" required
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="midentificacionEmp"># Identificación</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text">
                              <i class="bx bx-id-card"></i>
                              </span>
                              <input
                                type="text"
                                id="midentificacionEmp"
                                name="midentificacionEmp"
                                class="form-control phone-mask"
                                placeholder="1002003001"
                                aria-label="658 799 8941"
                                aria-describedby="basic-icon-default-phone2" required
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="msalarioEmp">Salario (Diario)</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-money"></i>
                              </span>
                              <input
                                type="number"
                                id="msalarioEmp"
                                name="msalarioEmp"
                                class="form-control phone-mask"
                                placeholder="15"
                                aria-label="658 799 8941"
                                aria-describedby="basic-icon-default-phone2" required
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="rolEmp">Rol</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-briefcase"></i>
                              </span>
                              <select class="form-select" id="mrolEmp" aria-label="Default select example" name="mrolEmp">
                                <option selected>Seleccione un Rol</option>
                                <?php
                                  for($i = 0; $i < count($roles); $i++){
                                    $r = $roles[$i];
                                    echo'
                                      <option value='.$r['rol_id'].'>'.$r['rol_nombre'].'</option>
                                    ';
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cerrar
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Confirmacion Eliminar Emplead-->
              <div class="modal modal-top fade" id="modalTop" tabindex="-1">
                <div class="modal-dialog">
                  <form class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalTopTitle">¿Desea eliminar al Empleado?</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <input type="text" id="modalEmp" hidden>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cerrar
                      </button>
                      <!-- onclick="deleteEmpleado(\''.base_url().'\','.$empleados[$i]['emp_id'].')" -->
                      <button type="submit" class="btn btn-primary" onclick='deleteEmpleado("<?php base_url() ?>")'>Confirmar</button>
                    </div>
                  </form>
                </div>
              </div>
            
          