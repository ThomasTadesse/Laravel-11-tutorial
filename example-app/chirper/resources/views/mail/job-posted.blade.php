<h2>
    Job: {{ $job->title }}
</h2>

<p>
Congratulations! Your job has been posted. Here are the details:
this is a test job.
</p>

<p>
    <a href="{{ url('jobs/' . $job->id) }}">View Job listing</a>
</p>