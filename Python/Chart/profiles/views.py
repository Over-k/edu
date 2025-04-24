
import json
from django.shortcuts import render, redirect
from django.core.paginator import Paginator
from .models import Profile
from .forms import ProfileForm
import csv
from django.http import HttpResponse
from .models import Profile

def index(request):
    profiles = Profile.objects.all().order_by('-id')  # newest first
    form = ProfileForm()

    # Handle form submission
    if request.method == 'POST':
        form = ProfileForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('index')

    # Pagination setup (5 per page)
    paginator = Paginator(profiles, 5)
    page_number = request.GET.get('page')
    page_obj = paginator.get_page(page_number)

    # Chart data
    names = [p.name for p in profiles]
    ages = [p.age for p in profiles]

    context = {
        'form': form,
        'page_obj': page_obj,
        'profiles': profiles,
        'names': json.dumps(names),
        'ages': json.dumps(ages),
    }
    return render(request, 'profiles/index.html', context)


def delete_profile(request, pk):
    profile = Profile.objects.get(pk=pk)
    profile.delete()
    return redirect('index')

def export_profiles_csv(request):
    response = HttpResponse(content_type='text/csv')
    response['Content-Disposition'] = 'attachment; filename="profiles.csv"'

    writer = csv.writer(response)
    writer.writerow(['Name', 'Age'])

    for profile in Profile.objects.all():
        writer.writerow([profile.name, profile.age])

    return response
