<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IoTデータ履歴</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <i class="fas fa-microchip me-2"></i>IoTデータ管理システム
                        </a>
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link" href="/">
                                <i class="fas fa-home me-1"></i>ホーム
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">
                                <i class="fas fa-history me-2"></i>IoTデータ履歴
                            </h4>
                        </div>
                        <div class="card-body">
                            @if($data->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th><i class="fas fa-hashtag me-1"></i>ID</th>
                                                <th><i class="fas fa-clock me-1"></i>検出時刻</th>
                                                <th><i class="fas fa-cog me-1"></i>モード</th>
                                                <th><i class="fas fa-map-marker-alt me-1"></i>エリア</th>
                                                <th><i class="fas fa-calendar-plus me-1"></i>登録日時</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>
                                                        <span class="badge bg-info">
                                                            {{ $item->detected_at->format('Y-m-d H:i:s') }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-secondary">
                                                            {{ $item->mode }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-success">
                                                            {{ $item->area }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <small class="text-muted">
                                                            {{ $item->created_at->format('Y-m-d H:i:s') }}
                                                        </small>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- ページネーション -->
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $data->links() }}
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-database fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">データがありません</h5>
                                    <p class="text-muted">IoTデバイスからのデータがまだ送信されていません。</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- API情報カード -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-code me-2"></i>API情報
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6><i class="fas fa-plus-circle me-1"></i>データ送信</h6>
                                    <code>POST /api/iot-data</code>
                                    <pre class="bg-light p-2 mt-2"><code>{
  "detected_at": "2024-01-01 12:00:00",
  "mode": 1,
  "area": 2
}</code></pre>
                                </div>
                                <div class="col-md-6">
                                    <h6><i class="fas fa-list me-1"></i>データ取得</h6>
                                    <code>GET /api/iot-data</code>
                                    <p class="text-muted mt-2">全データをJSON形式で取得</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
