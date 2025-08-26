<?php $__env->startSection('title', 'Locais - Laravel Maps App'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-map-marker-alt me-2"></i>Locais Cadastrados</h1>
            <a href="<?php echo e(route('locations.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Adicionar Local
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-map me-2"></i>Mapa Interativo
                </h5>
            </div>
            <div class="card-body">
                <div id="map"></div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-list me-2"></i>Lista de Locais
                </h5>
            </div>
            <div class="card-body">
                <?php if($locations->count() > 0): ?>
                    <div class="list-group">
                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="list-group-item location-card">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6><?php echo e($location->name); ?></h6>
                                        <?php if($location->category): ?>
                                            <span class="badge bg-secondary mb-2"><?php echo e($location->category); ?></span>
                                        <?php endif; ?>
                                        <?php if($location->address): ?>
                                            <p class="mb-1 text-muted">
                                                <i class="fas fa-map-pin"></i> <?php echo e($location->address); ?>

                                            </p>
                                        <?php endif; ?>
                                        <p class="mb-1 text-muted small">
                                            <i class="fas fa-location-arrow me-1"></i>
                                            <?php echo e($location->latitude); ?>, <?php echo e($location->longitude); ?>

                                        </p>
                                    </div>
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo e(route('locations.show', $location->id)); ?>" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('locations.edit', $location->id)); ?>" class="btn btn-outline-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="<?php echo e(route('locations.destroy', $location->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este local?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-4">
                        <i class="fas fa-map-marker-alt fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Nenhum local cadastrado</h5>
                        <p class="text-muted">Clique em "Adicionar Local" para começar!</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inicializar o mapa
    var map = L.map('map').setView([-23.5505, -46.6333], 10); // São Paulo centro inicial

    // Adicionar camada do OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '@ OpenStreetMap contributors'
    }).addTo(map);

    // Array para armazenar os marcadores
    var markers = [];

    // Dados dos locais do PHP
    var locations = <?php echo json_encode($locations); ?>;

    // Adicionar marcadores para cada local
    locations.forEach(function(location) {
        var marker = L.marker([location.latitude, location.longitude])
            .addTo(map)
            .bindPopup(`
                <div class="text-center">
                    <h6><strong>${location.name}</strong></h6>
                    ${location.category ? `<p class="badge bg-secondary">${location.category}</p>` : ''}
                    ${location.address ? `<p><i class="fas fa-map-pin"></i> ${location.address}</p>` : ''}
                    ${location.description ? `<p>${location.description}</p>` : ''}
                    <div class="mt-2">
                        <a href="/locations/${location.id}" class="btn btn-sm btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            `);
        markers.push(marker);
    });

    // Ajustar o zoom para mostrar todos os marcadores
    if (markers.length > 0) {
        var group = new L.featureGroup(markers);
        map.fitBounds(group.getBounds().pad(0.1));
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Apache\htdocs\apiMapa_laravel-main (2)\apiMapa_laravel-main\apiMapa_laravel-main\resources\views/locations/index.blade.php ENDPATH**/ ?>