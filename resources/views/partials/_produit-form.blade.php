@csrf
  
  <div class="form-group">
    <label for="designation">Désignation</label>
    <input value="{{ old('designation') ?? $produit->designation }}" name="designation" id="designation" class="form-control" placeholder="" aria-describedby="helpId">
    @error('designation')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
    
  <div class="form-group">
      <label for="prix">Prix</label>
      <input value="{{ old('prix') ?? $produit->prix }}" name="prix" id="prix" class="form-control" placeholder="" aria-describedby="helpId" required>
      @error('prix')
    
        <small class="text-danger">{{ $message }}</small>
      @enderror
  </div>
   
  <div class="form-group">
      <label for="">Quantité</label>
      <input value="{{ old('quantite') ?? $produit->quantite }}" name="quantite" id="quantite" class="form-control" placeholder="" aria-describedby="helpId" required>
      @error('quantite')
      <small class="text-danger">{{ $message }}</small>
      @enderror
  </div>

  <div class="form-group">
    <label for="">Catégorie</label>
    <select class="form-control" name="categorie" id="categorie">
      @foreach ($categories as $categorie)
          
      <option {{ $categorie->id==$produit->category_id ? "selected": "" }} value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
      <option></option>
      
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Image</label>
    <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
    <small id="image" class="text-muted">Help text</small>
    @error('image')
      <small class="text-danger">{{ $message }}</small>
      @enderror
  </div>
  <div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3">{{ old("description") ?? $produit->description }}</textarea>
  </div>

  <button type="submit" class="btn btn-primary btn-block btn-lg">Valider</button>