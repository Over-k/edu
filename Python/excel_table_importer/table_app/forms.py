from django import forms
from .models import TableStructure, TableColumn, TableData, ExcelImport


class TableStructureForm(forms.ModelForm):
    """Form for creating a table structure."""
    class Meta:
        model = TableStructure
        fields = ['name']


class TableColumnForm(forms.ModelForm):
    """Form for adding a column to a table."""
    class Meta:
        model = TableColumn
        fields = ['name', 'data_type']


class ExcelImportForm(forms.ModelForm):
    """Form for uploading an Excel file."""
    class Meta:
        model = ExcelImport
        fields = ['file']


class HeaderMappingForm(forms.Form):
    """Form for mapping Excel headers to table columns."""
    mapping = forms.CharField(widget=forms.HiddenInput())
    
    def clean_mapping(self):
        mapping = self.cleaned_data['mapping']
        try:
            import json
            mapping_dict = json.loads(mapping)
            return mapping_dict
        except:
            raise forms.ValidationError("Invalid mapping format")


class TableDataForm(forms.Form):
    """Dynamic form for adding data to a table."""
    def __init__(self, *args, table_structure=None, **kwargs):
        super().__init__(*args, **kwargs)
        
        if table_structure:
            for column in table_structure.columns.all():
                field_name = f"column_{column.id}"
                
                if column.data_type == 'text':
                    self.fields[field_name] = forms.CharField(label=column.name, required=False)
                elif column.data_type == 'number':
                    self.fields[field_name] = forms.FloatField(label=column.name, required=False)
                elif column.data_type == 'date':
                    self.fields[field_name] = forms.DateField(
                        label=column.name,
                        required=False,
                        widget=forms.DateInput(attrs={'type': 'date'})
                    )
                elif column.data_type == 'boolean':
                    self.fields[field_name] = forms.BooleanField(label=column.name, required=False)