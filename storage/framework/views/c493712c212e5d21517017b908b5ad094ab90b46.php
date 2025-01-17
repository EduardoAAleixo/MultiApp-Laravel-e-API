<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!--BUTTON BACK-->
	<a href="<?php echo e(URL::route('aluno.index')); ?>" class="btn btn-default">Voltar Atrás</a>

	<hr>

	<h1 class="text-primary text-center"><b>Adicionar um Novo Aluno</b></h1>
	<h3 class="text-center">Preencha toda a informação.</h3>

	<hr>

	<!--FORMULÁRIO-->
	<form action="<?php echo e(URL::route('aluno.store')); ?>" method="POST">

		<!-- NOME -->
		<div class="form-group">
			<label for="none" class="control-label">Nome:</label>
			
			<input type="text" id="nome" name="nome" class="form-control" required>
		</div>

		<!-- CARTÃO CIDADÃO -->
		<div class="form-group">
			<label for="cartao_cidadao" class="control-label">Cartão de Cidadão:</label>
			
			<input type="text" id="cartao_cidadao" name="cartao_cidadao" class="form-control" required>
		</div>

		<!-- SEXO -->
		<div class="form-group">
			<label for="sexo" class="control-label">Sexo:</label>

			<select id="sexo" name="sexo" class="form-control" required>
					<option value="Masculino">Maculino</option>
					<option value="Feminino">Feminino</option>
			</select>
		</div>

		<!-- MORADA -->
		<div class="form-group">
			<label for="morada" class="control-label">Morada:</label>

			<input type="text" id="morada" name="morada" class="form-control" required>
		</div>

		<!-- NACIONALIDADE -->
		<div class="form-group">
			<label for="nacionalidade" class="control-label">Nacionalidade:</label>

			<input type="text" id="nacionalidade" name="nacionalidade" class="form-control" required>
		</div>

		<!-- E-MAIL -->
		<div class="form-group">
			<label for="email" class="control-label">E-mail:</label>

			<input type="email" id="email" name="email" class="form-control" required>
		</div>

		<!-- TELEMOVEL -->
		<div class="form-group">
			<label for="telemovel" class="control-label">Telemovel:</label>

			<input type="text" id="telemovel" name="telemovel" class="form-control" required>
		</div>

		<!-- ANO -->
		<div class="form-group">
			<label for="ano" class="control-label">Ano:</label>

			<select id="ano" name="ano[]" class="form-control" multiple required>
				
				<?php $__currentLoopData = $anos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ano): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo $ano->id; ?>"><?php echo $ano->nome; ?>
						</option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>

		<!--BUTTON SUBMIT -->
		<input type="submit" class="btn btn-primary" value="Inserir">
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
	</form>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>