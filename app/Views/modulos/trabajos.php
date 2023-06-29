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
                  <label class="mt-3"><h2>TRABAJOS</h2></label>
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
              <div class="alert alert-danger" role="alert" id="empEliminado">Trabajo Eliminado con Éxito</div>
              <!-- Layout Demo -->
              <div class="layout-demo-wrapper">
                <!-- Form controls -->
                <div class="col-xxl">
                  <div class="card mb-5">
                    <div class="card-body">
                      <form action="<?php echo base_url('nuevoTrabajo'); ?>" method="POST">
                        <div class="row mb-3">
                          <h4>Nuevo Trabajo</h4>
                          <label class="col-sm-2 col-form-label" for="propietarioTrb">Propietario</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                id="propietarioTrb"
                                name="propietarioTrb"
                                placeholder="Jose Enriquez"
                                aria-label="Jose Enriquez"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                            </div>
                          </div>
                            <label class="col-sm-2 col-form-label mt-2" for="detalleTrb">Detalle</label>
                            <div class="col-sm-10 mt-2">
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-detail"></i
                                ></span>
                                <input
                                type="text"
                                class="form-control"
                                id="detalleTrb"
                                name="detalleTrb"
                                placeholder="Levantamiento"
                                aria-label="Levantamiento"
                                aria-describedby="basic-icon-default-fullname2"
                                />
                              </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="direccionTrb">Dirección</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-landscape"></i
                              ></span>
                              <input
                                type="text"
                                id="direccionTrb"
                                name="direccionTrb"
                                class="form-control"
                                placeholder="Av. Quito y 12 de Febrero"
                                aria-label="Av. Quito y 12 de Febrero"
                                aria-describedby="basic-icon-default-company2"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="fechaTrb">Fecha</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text">
                              <i class="bx bx-calendar"></i>
                              </span>
                              <input
                                type="datetime-local"
                                id="fechaTrb"
                                name="fechaTrb"
                                class="form-control phone-mask"
                                placeholder="19/06/2023"
                                aria-label="658 799 8941"
                                aria-describedby="basic-icon-default-phone2"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="telefonoTrb">Teléfono</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-phone"></i>
                              </span>
                              <input
                                type="number"
                                id="telefonoTrb"
                                name="telefonoTrb"
                                class="form-control phone-mask"
                                placeholder="0991234567"
                                aria-label="0991234567"
                                aria-describedby="basic-icon-default-phone2"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="totalTrb">Total</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-money"></i>
                              </span>
                              <input
                                type="number"
                                id="totalTrb"
                                name="totalTrb"
                                class="form-control phone-mask"
                                placeholder="150"
                                aria-label="150"
                                aria-describedby="basic-icon-default-phone2"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Registrar Trabajo</button>
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
                          <th>Fecha</th>
                          <th>Propietario</th>
                          <th>Detalle</th>
                          <th>Dirección</th>
                          <th>Teléfono</th>
                          <th>Total</th>
                          <th>Acciones</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          </td>
                          <?php
                            for ($i = 0; $i < count($trabajos); $i++) {
                                $t = $trabajos[$i];    
                                echo '
                                    <tr>
                                        <td name="idTrb">' . $t['trb_id'] . '</td>
                                        <td>' . $t['trb_fecha'] . '</td>
                                        <td>' . $t['trb_propietario'] . '</td>
                                        <td>' . $t['trb_detalle'] . '</td>
                                        <td>' . $t['trb_direccion'] . '</td>
                                        <td>' . $t['trb_telefono'] . '</td>
                                        <td>' . $t['trb_total'] . '</td>
                                        <td> 
                                          <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modalCenter" onclick= "llenarModalEditTrabajos('.$t['trb_id'].',\''.$t['trb_detalle'].'\',\''.$t['trb_fecha'].'\',\''.$t['trb_direccion'].'\',\''.$t['trb_telefono'].'\',\''.$t['trb_total'].'\',\''.$t['trb_propietario'].'\')">
                                                <i class="bx bx-edit-alt me-1"></i> Editar</a>
                                              
                                              <a class="dropdown-item" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTop" onclick="idTrabajo('.$t['trb_id'].')">
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
                      <h5 class="modal-title" id="modalCenterTitle">Editar trabajo</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <form  action="<?php echo base_url('editarTrabajo')?>" method="POST">
                        <label class="col-sm-2 col-form-label" for="mpropietarioTrb">Propietario</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                id="midTrb"
                                name="midTrb"
                                placeholder="ID"
                                aria-label="ID"
                                aria-describedby="basic-icon-default-fullname2" hidden
                              />
                              <input
                                type="text"
                                class="form-control"
                                id="mpropietarioTrb"
                                name="mpropietarioTrb"
                                placeholder="Jose Enriquez"
                                aria-label="Jose Enriquez"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                            </div>
                          </div>
                            <label class="col-sm-2 col-form-label mt-2" for="mdetalleTrb">Detalle</label>
                            <div class="col-sm-10 mt-2">
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-detail"></i
                                ></span>
                                <input
                                type="text"
                                class="form-control"
                                id="mdetalleTrb"
                                name="mdetalleTrb"
                                placeholder="Levantamiento"
                                aria-label="Levantamiento"
                                aria-describedby="basic-icon-default-fullname2"
                                />
                              </div>
                            </div>
                          <label class="col-sm-2 col-form-label" for="mdireccionTrb">Dirección</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-landscape"></i
                              ></span>
                              <input
                                type="text"
                                id="mdireccionTrb"
                                name="mdireccionTrb"
                                class="form-control"
                                placeholder="Av. Quito y 12 de Febrero"
                                aria-label="Av. Quito y 12 de Febrero"
                                aria-describedby="basic-icon-default-company2"
                              />
                            </div>
                          </div>
                          <label class="col-sm-2 form-label" for="mfechaTrb">Fecha</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text">
                              <i class="bx bx-calendar"></i>
                              </span>
                              <input
                                type="datetime-local"
                                id="mfechaTrb"
                                name="mfechaTrb"
                                class="form-control phone-mask"
                                placeholder="19/06/2023"
                                aria-label="658 799 8941"
                                aria-describedby="basic-icon-default-phone2"
                              />
                            </div>
                          </div>
                          <label class="col-sm-2 form-label" for="mtelefonoTrb">Teléfono</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-phone"></i>
                              </span>
                              <input
                                type="number"
                                id="mtelefonoTrb"
                                name="mtelefonoTrb"
                                class="form-control phone-mask"
                                placeholder="0991234567"
                                aria-label="0991234567"
                                aria-describedby="basic-icon-default-phone2"
                              />
                            </div>
                          </div>
                          <label class="col-sm-2 form-label" for="mtotalTrb">Total</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-money"></i>
                              </span>
                              <input
                                type="number"
                                id="mtotalTrb"
                                name="mtotalTrb"
                                class="form-control phone-mask"
                                placeholder="150"
                                aria-label="150"
                                aria-describedby="basic-icon-default-phone2"
                              />
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
                      <h5 class="modal-title" id="modalTopTitle">¿Desea eliminar el Trabajo?</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <input type="text" id="modalTrb" hidden>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cerrar
                      </button>
                      <!-- onclick="deleteEmpleado(\''.base_url().'\','.$empleados[$i]['emp_id'].')" -->
                      <button type="submit" class="btn btn-primary" onclick='deleteTrabajo("<?php base_url() ?>")'>Eliminar</button>
                    </div>
                  </form>
                </div>
              </div>
            
          