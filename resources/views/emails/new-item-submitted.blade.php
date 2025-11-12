<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Item Submitted</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: linear-gradient(135deg, #116530 0%, #114232 100%);
            color: white;
            padding: 30px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-top: none;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .badge-lost {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-found {
            background: #d1fae5;
            color: #065f46;
        }

        .item-details {
            background: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .detail-row {
            margin: 10px 0;
            padding: 8px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #6b7280;
            font-size: 14px;
        }

        .detail-value {
            color: #111827;
            margin-top: 4px;
        }

        .button {
            display: inline-block;
            background: #116530;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            color: #6b7280;
            font-size: 14px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>🔍 New Item Submitted</h1>
        <p style="margin: 10px 0 0 0; opacity: 0.9;">SACLI FoundIt - Lost & Found System</p>
    </div>

    <div class="content">
        <span class="badge {{ $item->type === 'lost' ? 'badge-lost' : 'badge-found' }}">
            {{ strtoupper($item->type) }} ITEM
        </span>

        <h2 style="margin: 10px 0 20px 0; color: #111827;">{{ $item->title }}</h2>

        <div class="item-details">
            <div class="detail-row">
                <div class="detail-label">Description</div>
                <div class="detail-value">{{ $item->description }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Location</div>
                <div class="detail-value">📍 {{ $item->location }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Date {{ $item->type === 'lost' ? 'Lost' : 'Found' }}</div>
                <div class="detail-value">📅 {{ $item->date_occurred->format('F j, Y') }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Category</div>
                <div class="detail-value">🏷️ {{ $item->category->name ?? 'Other' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Submitted By</div>
                <div class="detail-value">
                    {{ $item->user->name }}
                    @if ($item->user->course || $item->user->year)
                        <br>
                        <span style="color: #6b7280; font-size: 13px;">
                            @if ($item->user->course)
                                {{ $item->user->course }}
                            @endif
                            @if ($item->user->course && $item->user->year)
                                •
                            @endif
                            @if ($item->user->year)
                                Year {{ $item->user->year }}
                            @endif
                        </span>
                    @endif
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Status</div>
                <div class="detail-value">⏳ Pending Review</div>
            </div>
        </div>

        <p style="color: #6b7280; font-size: 14px;">
            This item has been submitted and is awaiting admin review. Please verify the details and approve or reject
            the submission.
        </p>

        <center>
            <a href="{{ route('admin.pending-items') }}" class="button">
                Review Item in Admin Panel
            </a>
        </center>

        <div class="footer">
            <p>
                <strong>SACLI FoundIt</strong><br>
                St. Anne College Lucena, Inc.<br>
                Lost and Found Management System
            </p>
            <p style="font-size: 12px; color: #9ca3af;">
                This is an automated notification. Please do not reply to this email.
            </p>
        </div>
    </div>
</body>

</html>
