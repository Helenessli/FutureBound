<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
</head>
<body>
    <h1>Form Submission Details</h1>
    <p><strong>Name:</strong> {{ $dataReceived['name'] }}</p>
    <p><strong>Amount:</strong> {{ $dataReceived['amount'] }}</p>
    <p><strong>Criteria:</strong> {{ $dataReceived['criteria'] }}</p>
    <p><strong>Deadline:</strong> {{ $dataReceived['deadline'] }}</p>
    <p><strong>Url:</strong> {{ $dataReceived['url'] }}</p>
</body>
</html>