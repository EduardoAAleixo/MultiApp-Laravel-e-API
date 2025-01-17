<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <!--TITULO-->
    <h1 class="text-primary text-center""><b>Professores</b></h1>
    <h4 class="text-center">Professores registados na base de dados.</h4>
    
    <hr>
    
    <!--TABELA-->
    <div class="table-responsive">
        <table class="table table-striped">
            <!--HEADER TABELA-->
            <thead>
                <tr>
                    <th>Nº Professor</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Disciplinas</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>

            <!--BODY TABELA-->
            <tbody>
                <?php $__currentLoopData = $professores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo $professor->id; ?></td>
                    <td><?php echo $professor->nome; ?></td>
                    <td><?php echo $professor->email; ?></td>
                    
                    <!-- BUTTON SHOW -->
                    <td>
                        <a class="btn btn-default" href="<?php echo e(URL::route('professor.show', $professor->id)); ?>">
                            <span class="glyphicon glyphicon-tags"></span>
                        </a>
                    </td>
                    
                    <!-- BUTTON EDIT -->
                    <td>
                        <a class="btn btn-warning" href="<?php echo e(URL::route('professor.edit', $professor->id)); ?>">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </td>
                    
                    <!-- BUTTON DESTROY -->
                    <td>
                        <form action="<?php echo e(route('professor.destroy', $professor->id)); ?>" method="POST">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" name="_method" value="DELETE">
                            <button name="remover" type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </form>

                    <!--MODAL / POP-UP -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!--HEADER MODAL-->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Atenção</h4>
                                    </div>
                                    <!--BODY MODAL-->
                                    <div class="modal-body">
                                        <p>Tem a certeza que deseja apagar a professor?</p>
                                    </div>
                                    <!--FOOTER MODAL-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                        <button type="button" class="btn btn-default" id="apagar">Sim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <hr>
    <!--BUTTON ADD-->
    <a href="<?php echo e(URL::route('professor.create')); ?>" class="btn btn-primary">Adicionar novo Professor</a>
</div>

<!--APAGA O A PROFESSOR-->
<script>
    $('button[name="remover"]').on('click', function(e) {
        var $form = $(this).closest('form');
        e.preventDefault();
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false
        })
        .one('click', '#apagar', function(e) {
            $form.trigger('submit');
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>