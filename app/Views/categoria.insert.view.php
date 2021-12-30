<?php

/* 
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
?>

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <?php
                if(!isset($categoria)){
                ?>
                Insertada categoría: <?php echo $nombre; ?> con id <?php echo $id; ?>
                <?php
                }
                else{
                    //Cuando insertemos como objeto
                    ?>
                                        
                    <div class="col-12">Insertada categoría Object:<?php var_dump($categoria); ?> <?php echo $categoria->getFullName(); ?></div>
                <?php
                }
                ?>
            </div>
        </div>
      </div>



