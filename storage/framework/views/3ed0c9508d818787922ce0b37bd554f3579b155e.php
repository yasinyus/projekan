<?php $__env->startSection('content'); ?>
<div>
    <div class="d-flex flex-column flex-root">
            <!--begin::List Widget 9-->
            <div class="text-left mb-5">
                <h2 class="text-left mb-3">
                    PERIZINAN DALAM PROSES
                </h2>
            </div>
            <!--begin::Card-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1 me-5"></div>
                    </div>
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" 
                            data-bs-target="#kt_modal_izin_jartel">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Tambah</button>
                        <!--end::Button-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table id="kt_datatable_permohonan_perizinan" class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th hidden="hidden"></th>
                                <th class="min-w-120px">Jenis Izin</th>
                                <th class="min-w-120px">Nomor KIB</th>
                                <th class="min-w-210px">Tgl. KIB</th>
                                <th class="min-w-120px">KBLI</th>
                                <th class="min-w-250px">Jenis Penyelenggaraan</th>
                                <th class="min-w-120px">Media Transmisi</th>
                                <th class="text-end min-w-100px"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">								
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

            <!--begin::Modal - Permohonan Perizinan-->
            <?php echo $__env->make('perizinan.form-perizinan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--end::Modal - Permohonan Perizinan-->
            
            <!--begin::Modal - Summary -->
            <?php echo $__env->make('perizinan.modal-summary-perizinan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--end::Modal - Summary -->																											
    </div>
    
    <!--begin::Modal next step -->
    <?php echo $__env->make('dashboard.modal-next-step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--end::Modal-->
    
    
    <!-- Modal ULO -->
    <?php echo $__env->make('ulo.form-ulo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--end::Modal ULO-->        
</div>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('1826d1f1-9617-43d2-9f04-78bf775b7c5b')): $__env->markAsRenderedOnce('1826d1f1-9617-43d2-9f04-78bf775b7c5b'); ?>
    <?php $__env->startPush('scripts'); ?>        
    <script src="<?php echo e(asset('theme')); ?>/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('theme')); ?>/js/kominfo/manajemen-perizinan/table-perizinan-dalam-proses.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('theme')); ?>/js/kominfo/manajemen-perizinan/form-izin-jartel.js" type="text/javascript"></script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>


<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dev/front-end/resources/views/dashboard.blade.php ENDPATH**/ ?>