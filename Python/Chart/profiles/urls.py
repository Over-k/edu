from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('delete/<int:pk>/', views.delete_profile, name='delete_profile'),
    path('export/csv/', views.export_profiles_csv, name='export_profiles_csv'),
]
