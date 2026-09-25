<x-weight>
    <x-slot:title>
        ติดตามน้ำหนักร่างกาย - Weight Tracker
    </x-slot:title>

    <!-- Notification Success -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- ฟอร์มบันทึกน้ำหนัก -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">
                    <i class="bi bi-plus-circle text-primary me-1"></i> บันทึกน้ำหนักใหม่
                </div>
                <div class="card-body">
                    <form action="{{ route('weights.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="weight" class="form-label">น้ำหนัก (กิโลกรัม) <span class="text-danger">*</span></label>
                            <input type="number" step="0.1" class="form-control @error('weight') is-invalid @enderror" 
                                   id="weight" name="weight" value="{{ old('weight') }}" placeholder="เช่น 65.5">
                            @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="recorded_at" class="form-label">วันที่บันทึก <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('recorded_at') is-invalid @enderror" 
                                   id="recorded_at" name="recorded_at" value="{{ old('recorded_at', date('Y-m-d')) }}">
                            @error('recorded_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="note" class="form-label">หมายเหตุ</label>
                            <input type="text" class="form-control @error('note') is-invalid @enderror" 
                                   id="note" name="note" value="{{ old('note') }}" placeholder="เช่น หลังออกกำลังกาย">
                            @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-save me-1"></i> บันทึกข้อมูล
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Google Chart และ ตารางแสดงข้อมูล -->
        <div class="col-md-8">
            <!-- Google Chart Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="bi bi-graph-up text-success me-1"></i> กราฟแสดงแนวโน้มน้ำหนัก
                </div>
                <div class="card-body">
                    @if($logs->count() > 0)
                        <div id="curve_chart" style="width: 100%; height: 300px;"></div>
                    @else
                        <div class="text-center py-4 text-muted">ยังไม่มีข้อมูลสำหรับแสดงกราฟ</div>
                    @endif
                </div>
            </div>

            <!-- Table Card -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">
                    <i class="bi bi-list-ul text-secondary me-1"></i> ประวัติการบันทึกน้ำหนัก
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>วันที่</th>
                                    <th>น้ำหนัก (กก.)</th>
                                    <th>หมายเหตุ</th>
                                    <th class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($logs as $log)
                                    <tr>
                                        <td>{{ $log->recorded_at->format('d/m/Y') }}</td>
                                        <td><span class="badge bg-info text-dark fs-6">{{ number_format($log->weight, 2) }}</span></td>
                                        <td>{{ $log->note ?? '-' }}</td>
                                        <td class="text-center">
                                            <!-- ปุ่มเปิด Modal แก้ไข -->
                                            <button class="btn btn-sm btn-outline-warning me-1" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editModal{{ $log->id }}">
                                                <i class="bi bi-pencil"></i> แก้ไข
                                            </button>

                                            <!-- ปุ่มลบข้อมูล -->
                                            <form action="{{ route('weights.destroy', $log->id) }}" method="POST" class="d-inline"
                                                  onsubmit="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i> ลบ
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal แก้ไขข้อมูล -->
                                    <div class="modal fade" id="editModal{{ $log->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">แก้ไขข้อมูลน้ำหนัก</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('weights.update', $log->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">น้ำหนัก (กิโลกรัม)</label>
                                                            <input type="number" step="0.1" class="form-control" name="weight" value="{{ old('weight', $log->weight) }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">วันที่บันทึก</label>
                                                            <input type="date" class="form-control" name="recorded_at" value="{{ old('recorded_at', $log->recorded_at->format('Y-m-d')) }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">หมายเหตุ</label>
                                                            <input type="text" class="form-control" name="note" value="{{ old('note', $log->note) }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-3 text-muted">ยังไม่มีข้อมูลน้ำหนักในระบบ</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Chart Script -->
    @push('scripts')
    <script type="application/json" id="weight-data">
    @json($logs->map(fn($log) => [$log->recorded_at->format('d/m/Y'), $log->weight]))
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var rawData = JSON.parse(document.getElementById('weight-data').textContent);
        var chartData = [['วันที่', 'น้ำหนัก (กก.)'], ...rawData];
        var data = google.visualization.arrayToDataTable(chartData);

        var options = {
            title: 'แนวโน้มการเปลี่ยนแปลงน้ำหนัก',
            curveType: 'function',
            legend: { position: 'bottom' },
            colors: ['#0d6efd'],
            hAxis: { title: 'วันที่' },
            vAxis: { title: 'น้ำหนัก (กิโลกรัม)' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
    }
</script>
    @endpush
</x-weight>