<div
    style="
        font-family: Arial, sans-serif;
        max-width: 650px;
        margin: auto;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
    "
>

    <!-- Header -->
    <div
        style="
            background: #063D31;
            padding: 28px;
            color: #ffffff;
        "
    >
        <h2 style="margin:0; color:#ffffff;">
            New Partnership Enquiry
        </h2>

        <p style="margin:10px 0 0 0; color:#E7ECE9; line-height:1.6;">
            A new partnership enquiry has been submitted
            through the ZYNTH Africa website.
        </p>
    </div>


    <!-- Content -->
    <div style="padding:30px;">

        <table
            width="100%"
            cellpadding="12"
            cellspacing="0"
            style="
                border-collapse:collapse;
                font-size:14px;
                color:#333333;
            "
        >

            <!-- Name -->
            <tr style="background:#F8F6F0;">
                <td width="190">
                    <strong>Name</strong>
                </td>

                <td>
                    {{ $contact->name }}
                </td>
            </tr>


            <!-- Email -->
            <tr>
                <td>
                    <strong>Email</strong>
                </td>

                <td>
                    <a
                        href="mailto:{{ $contact->email }}"
                        style="color:#063D31;"
                    >
                        {{ $contact->email }}
                    </a>
                </td>
            </tr>


            <!-- Organisation -->
            <tr style="background:#F8F6F0;">
                <td>
                    <strong>Organisation</strong>
                </td>

                <td>
                    {{ $contact->organisation }}
                </td>
            </tr>


            <!-- Phone -->
            <tr>
                <td>
                    <strong>Phone Number</strong>
                </td>

                <td>
                    {{ $contact->phone ?: 'Not Provided' }}
                </td>
            </tr>


            <!-- Partnership Type -->
            <tr style="background:#F8F6F0;">
                <td>
                    <strong>Partnership Interest</strong>
                </td>

                <td>
                    {{ ucwords(str_replace('-', ' ', $contact->partnership_type)) }}
                </td>
            </tr>


            <!-- Submitted -->
            <tr>
                <td>
                    <strong>Submitted At</strong>
                </td>

                <td>
                    {{ now()->format('d M Y h:i A') }}
                </td>
            </tr>

        </table>


        <!-- Message -->
        <div style="margin-top:30px;">

            <h3
                style="
                    color:#063D31;
                    margin-bottom:12px;
                "
            >
                Partnership Message
            </h3>

            <div
                style="
                    background:#F8F6F0;
                    border-left:4px solid #D6A536;
                    padding:20px;
                    border-radius:6px;
                    color:#333333;
                    line-height:1.8;
                    white-space:pre-line;
                "
            >{{ $contact->message }}</div>

        </div>


        <!-- Reply Button -->
        <div style="margin-top:30px; text-align:center;">

            <a
                href="mailto:{{ $contact->email }}"
                style="
                    background:#D6A536;
                    color:#063D31;
                    text-decoration:none;
                    padding:14px 26px;
                    border-radius:6px;
                    display:inline-block;
                    font-weight:bold;
                "
            >
                Reply to {{ $contact->name }}
            </a>

        </div>

    </div>


    <!-- Footer -->
    <div
        style="
            background:#063D31;
            padding:18px 25px;
            text-align:center;
            color:#E7ECE9;
            font-size:12px;
        "
    >
        <strong style="color:#D6A536;">
            ZYNTH Africa
        </strong>

        <br>

        Layering Platforms. Advancing Africa's Collective Good.
    </div>

</div>
